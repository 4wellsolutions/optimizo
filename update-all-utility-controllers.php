<?php

/**
 * Update ALL utility controllers with renamed view files
 */

echo "=== UPDATING ALL UTILITY CONTROLLERS ===\n\n";

$controllersDir = __DIR__ . '/app/Http/Controllers/Tools/Utility/';

// All view file renames that need controller updates
$viewRenames = [
    'html-to-markdown' => 'html-to-markdown-converter',
    'json-to-yaml' => 'json-to-yaml-converter',
    'markdown-to-html' => 'markdown-to-html-converter',
    'qr-generator' => 'qr-code-generator',
    'url-encoder' => 'url-encoder-decoder',
    'csv-to-json' => 'csv-to-json-converter',
    'csv-to-tsv' => 'csv-to-tsv-converter',
    'csv-to-xml' => 'csv-to-xml-converter',
    'json-to-csv' => 'json-to-csv-converter',
    'json-to-sql' => 'json-to-sql-converter',
];

$totalUpdated = 0;
$controllers = glob($controllersDir . '*.php');

echo "Scanning " . count($controllers) . " controller files...\n\n";

foreach ($controllers as $controllerPath) {
    $content = file_get_contents($controllerPath);
    $originalContent = $content;
    $updatedInFile = 0;

    foreach ($viewRenames as $oldView => $newView) {
        $oldPattern = "tools.utility.$oldView";
        $newPattern = "tools.utility.$newView";

        if (strpos($content, $oldPattern) !== false) {
            $content = str_replace($oldPattern, $newPattern, $content);
            $updatedInFile++;
        }
    }

    if ($content !== $originalContent) {
        file_put_contents($controllerPath, $content);
        $basename = basename($controllerPath);
        echo "✅ Updated: $basename ($updatedInFile reference(s))\n";
        $totalUpdated++;
    }
}

echo "\n" . str_repeat("=", 70) . "\n";
echo "Total controllers updated: $totalUpdated\n";
echo str_repeat("=", 70) . "\n";

if ($totalUpdated > 0) {
    echo "\n✅ All controller view references updated!\n";
} else {
    echo "\n⚠️  No controllers needed updating (already up to date)\n";
}
