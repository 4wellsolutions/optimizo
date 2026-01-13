<?php

/**
 * Final utility view file analysis and rename
 */

echo "=== FINAL UTILITY VIEW FILE ANALYSIS ===\n\n";

$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';
$utilities = include $enFile;
$slugs = array_keys($utilities);

$viewsDir = __DIR__ . '/resources/views/tools/utility/';
$viewFiles = glob($viewsDir . '*.blade.php');

echo "Translation slugs: " . count($slugs) . "\n";
echo "View files: " . count($viewFiles) . "\n\n";

// List specific slugs we need to check
$checkSlugs = [
    'base64',
    'base64-encoder-decoder',
    'html-encoder-decoder',
    'unicode-encoder-decoder',
    'url-encoder-decoder',
    'json-to-csv-converter',
    'json-to-sql-converter',
    'csv-to-json-converter',
    'csv-to-xml-converter',
    'csv-to-tsv-converter',
];

echo "Checking specific slugs:\n";
echo str_repeat("-", 80) . "\n";

foreach ($checkSlugs as $slug) {
    $viewPath = $viewsDir . $slug . '.blade.php';
    $exists = file_exists($viewPath) ? '✅' : '❌';
    $inTranslation = isset($utilities[$slug]) ? 'YES' : 'NO';
    echo sprintf("%-40s %s View exists  | In translation: %s\n", $slug, $exists, $inTranslation);
}

echo "\n" . str_repeat("=", 80) . "\n";
echo "Missing view files for existing slugs:\n";
echo str_repeat("=", 80) . "\n";

$missing = [];
foreach ($slugs as $slug) {
    if (!file_exists($viewsDir . $slug . '.blade.php')) {
        $missing[] = $slug;
    }
}

if (count($missing) > 0) {
    foreach ($missing as $m) {
        echo "❌ $m\n";
    }
} else {
    echo "✅ ALL SLUGS HAVE MATCHING VIEW FILES!\n";
}
