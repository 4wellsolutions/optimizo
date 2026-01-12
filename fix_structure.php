<?php

$files = [
    'd:/workspace/optimizo/resources/lang/en/tools/document.php',
    'd:/workspace/optimizo/resources/lang/en/tools/converters.php',
    'd:/workspace/optimizo/resources/lang/en/tools/time.php',
    'd:/workspace/optimizo/resources/lang/en/tools/images.php',
    'd:/workspace/optimizo/resources/lang/en/tools/network.php',
    'd:/workspace/optimizo/resources/lang/en/tools/spreadsheet.php',
];

foreach ($files as $file) {
    if (!file_exists($file)) {
        echo "File not found: $file\n";
        continue;
    }

    $content = file_get_contents($file);

    // Pattern to match 'seo' => [ 'title' => ..., 'h1' => ...
    // Account for potential whitespace and indentation
    $pattern = "/'seo'\s*=>\s*\[\s*'title'\s*=>\s*'(.*?)',\s*'h1'\s*=>\s*'(.*?)',/s";

    $replacement = "'meta' => [\n            'h1' => '$2',\n        ],\n        'seo' => [\n            'title' => '$1',\n            'h1' => '$2',";

    $newContent = preg_replace($pattern, $replacement, $content);

    if ($newContent !== $content) {
        file_put_contents($file, $newContent);
        echo "Fixed: $file\n";
    } else {
        echo "No changes needed or pattern not found: $file\n";
    }
}
