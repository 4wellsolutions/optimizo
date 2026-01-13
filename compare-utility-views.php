<?php

/**
 * Compare utility slugs from EN translation file with view files
 */

echo "=== UTILITY VIEW FILES VS TRANSLATION SLUGS ===\n\n";

// Get slugs from EN translation file
$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';
$utilities = include $enFile;
$slugs = array_keys($utilities);

echo "Translation slugs: " . count($slugs) . "\n";

// Get view files
$viewsDir = __DIR__ . '/resources/views/tools/utility/';
$viewFiles = glob($viewsDir . '*.blade.php');
$viewNames = [];

foreach ($viewFiles as $file) {
    $basename = basename($file, '.blade.php');
    $viewNames[] = $basename;
}

echo "View files: " . count($viewFiles) . "\n\n";

// Compare
$matches = [];
$mismatches = [];

foreach ($slugs as $slug) {
    if (in_array($slug, $viewNames)) {
        $matches[] = $slug;
    } else {
        // Try to find similar
        $found = false;
        foreach ($viewNames as $viewName) {
            similar_text($slug, $viewName, $percent);
            if ($percent > 70) {
                $mismatches[] = [
                    'slug' => $slug,
                    'view' => $viewName,
                    'similarity' => round($percent, 1)
                ];
                $found = true;
                break;
            }
        }
        if (!$found) {
            $mismatches[] = [
                'slug' => $slug,
                'view' => 'NOT FOUND',
                'similarity' => 0
            ];
        }
    }
}

echo "✅ MATCHES: " . count($matches) . "\n";
echo "⚠️  NEED ATTENTION: " . count($mismatches) . "\n\n";

if (count($mismatches) > 0) {
    echo str_repeat("=", 90) . "\n";
    echo "MISMATCHES:\n";
    echo str_repeat("=", 90) . "\n";
    printf("%-45s %-35s %s\n", "TRANSLATION SLUG", "VIEW FILE", "MATCH");
    echo str_repeat("-", 90) . "\n";

    foreach ($mismatches as $m) {
        printf("%-45s %-35s %s%%\n", $m['slug'], $m['view'], $m['similarity']);
    }

    echo "\n" . str_repeat("=", 90) . "\n";
    echo "POWERSHELL RENAME COMMANDS:\n";
    echo str_repeat("=", 90) . "\n";

    foreach ($mismatches as $m) {
        if ($m['view'] != 'NOT FOUND' && $m['similarity'] > 70) {
            echo "Rename-Item -Path 'resources/views/tools/utility/{$m['view']}.blade.php' ";
            echo "-NewName '{$m['slug']}.blade.php'\n";
        }
    }
}

echo "\n✅ Audit complete\n";
