<?php

/**
 * Find utility view files that don't match their translation slug
 */

$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';
$utilities = include $enFile;
$slugs = array_keys($utilities);

$viewsDir = __DIR__ . '/resources/views/tools/utility/';
$viewFiles = glob($viewsDir . '*.blade.php');
$viewNames = [];

foreach ($viewFiles as $file) {
    $viewNames[] = basename($file, '.blade.php');
}

$renames = [];

foreach ($slugs as $slug) {
    if (!in_array($slug, $viewNames)) {
        // Find similar
        foreach ($viewNames as $viewName) {
            similar_text($slug, $viewName, $percent);
            if ($percent > 70) {
                $renames[] = ['old' => $viewName, 'new' => $slug, 'match' => round($percent, 1)];
                break;
            }
        }
    }
}

if (count($renames) > 0) {
    echo "RENAME NEEDED: " . count($renames) . " files\n\n";
    foreach ($renames as $r) {
        echo "{$r['old']}.blade.php => {$r['new']}.blade.php (Match: {$r['match']}%)\n";
    }

    // Save to JSON
    file_put_contents(__DIR__ . '/utility-renames.json', json_encode($renames, JSON_PRETTY_PRINT));
    echo "\n✅ Saved to utility-renames.json\n";
} else {
    echo "✅ ALL VIEW FILES MATCH SLUGS!\n";
}
