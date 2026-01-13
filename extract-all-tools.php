<?php

// Script to extract all tool keys from translation files

$translationFiles = [
    'converters',
    'document',
    'images',
    'network',
    'seo',
    'spreadsheet',
    'time',
    'utilities',
    'utilities_append',
    'youtube'
];

$allTools = [];
$categoryCount = [];

foreach ($translationFiles as $category) {
    $filePath = __DIR__ . "/resources/lang/en/tools/{$category}.php";

    if (!file_exists($filePath)) {
        echo "File not found: $filePath\n";
        continue;
    }

    $translations = include $filePath;

    if (!is_array($translations)) {
        echo "Invalid format in $category.php\n";
        continue;
    }

    $toolsInCategory = array_keys($translations);
    $categoryCount[$category] = count($toolsInCategory);

    foreach ($toolsInCategory as $toolSlug) {
        $allTools[] = [
            'category' => $category,
            'slug' => $toolSlug,
            'has_meta_en' => isset($translations[$toolSlug]['meta']),
            'has_h1_en' => isset($translations[$toolSlug]['meta']['h1']),
            'has_subtitle_en' => isset($translations[$toolSlug]['meta']['subtitle'])
        ];
    }
}

echo "\n=== TOOL COUNT BY CATEGORY ===\n";
foreach ($categoryCount as $cat => $count) {
    echo sprintf("%-20s: %3d tools\n", $cat, $count);
}

$totalTools = count($allTools);
echo "\n=== TOTAL TOOLS: {$totalTools} ===\n\n";

// Output as JSON for task.md generation
file_put_contents('all-tools-inventory.json', json_encode($allTools, JSON_PRETTY_PRINT));

echo "Full inventory saved to: all-tools-inventory.json\n";
