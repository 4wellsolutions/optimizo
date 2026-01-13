<?php

/**
 * Direct comparison - list what's in translations but not in views
 */

$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';
$utilities = include $enFile;
$slugs = array_keys($utilities);
sort($slugs);

$viewsDir = __DIR__ . '/resources/views/tools/utility/';
$viewFiles = glob($viewsDir . '*.blade.php');
$viewNames = [];

foreach ($viewFiles as $file) {
    $viewNames[] = basename($file, '.blade.php');
}
sort($viewNames);

echo "Translation slugs: " . count($slugs) . "\n";
echo "View files: " . count($viewNames) . "\n\n";

// Find slugs without matching views
$missing = [];
foreach ($slugs as $slug) {
    if (!in_array($slug, $viewNames)) {
        $missing[] = $slug;
    }
}

// Find views without matching slugs  
$extra = [];
foreach ($viewNames as $view) {
    if (!in_array($view, $slugs)) {
        $extra[] = $view;
    }
}

if (count($missing) > 0) {
    echo "❌ SLUGS WITHOUT VIEWS (" . count($missing) . "):\n";
    foreach ($missing as $m) {
        echo "  - $m\n";
    }
    echo "\n";
}

if (count($extra) > 0) {
    echo "📄 VIEWS WITHOUT SLUGS (" . count($extra) . "):\n";
    foreach ($extra as $e) {
        echo "  - $e\n";
    }
    echo "\n";
}

if (count($missing) == 0 && count($extra) == 0) {
    echo "✅ ALL " . count($slugs) . " FILES MATCH PERFECTLY!\n";
}

// Try to match them up
if (count($missing) > 0 && count($extra) > 0) {
    echo str_repeat("=", 90) . "\n";
    echo "SUGGESTED RENAMES:\n";
    echo str_repeat("=", 90) . "\n";

    $paired = [];
    foreach ($missing as $slug) {
        $bestMatch = null;
        $bestPercent = 0;

        foreach ($extra as $view) {
            similar_text($slug, $view, $percent);
            if ($percent > $bestPercent && $percent > 60) {
                $bestPercent = $percent;
                $bestMatch = $view;
            }
        }

        if ($bestMatch) {
            $paired[] = ['old' => $bestMatch, 'new' => $slug, 'match' => round($bestPercent, 1)];
        }
    }

    foreach ($paired as $p) {
        echo sprintf("%-40s => %-40s (%s%%)\n", $p['old'], $p['new'], $p['match']);
    }

    if (count($paired) > 0) {
        echo "\n" . str_repeat("=", 90) . "\n";
        echo "POWERSHELL COMMANDS:\n";
        echo str_repeat("=", 90) . "\n";
        foreach ($paired as $p) {
            echo "Rename-Item 'resources/views/tools/utility/{$p['old']}.blade.php' '{$p['new']}.blade.php'\n";
        }
    }
}
