<?php

/**
 * Utility view file renamer - match translation slugs
 */

echo "=== UTILITY VIEW FILE AUDIT & RENAME ===\n\n";

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
        unset($viewNames[$slug]); // Remove from remaining
    }
}

echo "✅ Perfect matches: $matches/" . count($slugs) . "\n";
echo "📄 Remaining view files: " . count($viewNames) . "\n";
echo "❌ Slugs needing views: " . (count($slugs) - $matches) . "\n\n";

// Find best matches for remaining slugs
$renames = [];
foreach ($slugs as $slug) {
    if (!file_exists($viewsDir . $slug . '.blade.php')) {
        // Need to find this slug
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
                'oldPath' => $viewNames[$bestMatch],
                'newPath' => $viewsDir . $slug . '.blade.php'
            ];
        } else {
            echo "⚠️  NO MATCH for slug: $slug (best: " . ($bestMatch ?? 'none') . " at " . round($bestPercent, 1) . "%)\n";
        }
    }
}

if (count($renames) > 0) {
    echo "\n" . str_repeat("=", 100) . "\n";
    echo "RENAME PLAN (" . count($renames) . " files):\n";
    echo str_repeat("=", 100) . "\n";
    printf("%-45s => %-45s %s\n", "CURRENT FILE", "NEW FILE", "MATCH");
    echo str_repeat("-", 100) . "\n";

    foreach ($renames as $r) {
        printf("%-45s => %-45s %s%%\n", $r['old'] . '.blade.php', $r['new'] . '.blade.php', $r['match']);
    }

    echo "\n\nProceed with renaming these files? (yes/no): ";
    $input = trim(fgets(STDIN));

    if (strtolower($input) === 'yes' || strtolower($input) === 'y') {
        echo "\n";
        foreach ($renames as $r) {
            if (rename($r['oldPath'], $r['newPath'])) {
                echo "✅ Renamed: {$r['old']}.blade.php => {$r['new']}.blade.php\n";
            } else {
                echo "❌ FAILED: {$r['old']}.blade.php => {$r['new']}.blade.php\n";
            }
        }
        echo "\n✅ Renaming complete!\n";
    } else {
        echo "\n❌ Renaming cancelled.\n";
    }
} else {
    echo "\n✅ All view files match their slugs perfectly!\n";
}
