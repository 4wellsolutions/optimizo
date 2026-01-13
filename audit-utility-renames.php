<?php

/**
 * Utility view file audit (dry-run)
 */

echo "=== UTILITY VIEW FILE AUDIT ===\n\n";

$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';
$utilities = include $enFile;
$slugs = array_keys($utilities);
sort($slugs);

$viewsDir = __DIR__ . '/resources/views/tools/utility/';
$viewFiles = glob($viewsDir . '*.blade.php');
$viewNames = [];

foreach ($viewFiles as $file) {
    $viewNames[basename($file, '.blade.php')] = $file;
}

// Perfect matches
$matches = 0;
foreach ($slugs as $slug) {
    if (isset($viewNames[$slug])) {
        $matches++;
        unset($viewNames[$slug]);
    }
}

echo "✅ Perfect matches: $matches/" . count($slugs) . "\n";
echo "📄 Remaining view files: " . count($viewNames) . "\n";
echo "❌ Slugs needing views: " . (count($slugs) - $matches) . "\n\n";

// Find best matches
$renames = [];
foreach ($slugs as $slug) {
    if (!file_exists($viewsDir . $slug . '.blade.php')) {
        $bestMatch = null;
        $bestPercent = 0;

        foreach (array_keys($viewNames) as $viewName) {
            similar_text($slug, $viewName, $percent);
            if ($percent > $bestPercent && $percent > 50) {
                $bestPercent = $percent;
                $bestMatch = $viewName;
            }
        }

        if ($bestMatch && $bestPercent > 70) {
            $renames[] = [
                'old' => $bestMatch,
                'new' => $slug,
                'match' => round($bestPercent, 1),
            ];
        } else {
            echo "⚠️  NO MATCH for slug: $slug\n";
        }
    }
}

if (count($renames) > 0) {
    echo "\nRENAME PLAN (" . count($renames) . " files):\n";
    echo str_repeat("=", 100) . "\n";
    printf("%-50s => %-40s %s\n", "CURRENT FILE", "NEW FILE", "MATCH");
    echo str_repeat("-", 100) . "\n";

    foreach ($renames as $r) {
        printf("%-50s => %-40s %s%%\n", $r['old'] . '.blade.php', $r['new'] . '.blade.php', $r['match']);
    }

    // Save to JSON for auto-execute
    file_put_contents(__DIR__ . '/utility-renames-final.json', json_encode($renames, JSON_PRETTY_PRINT));
    echo "\n✅ Rename plan saved to: utility-renames-final.json\n";
} else {
    echo "\n✅ All view files match perfectly!\n";
}
