<?php

/**
 * Execute utility view file renames
 */

echo "=== RENAMING UTILITY VIEW FILES ===\n\n";

$viewsDir = __DIR__ . '/resources/views/tools/utility/';

$renames = [
    // Based on translation slugs that need these specific files
    ['old' => 'html-to-markdown.blade.php', 'new' => 'html-to-markdown-converter.blade.php'],
    ['old' => 'json-to-yaml.blade.php', 'new' => 'json-to-yaml-converter.blade.php'],
    ['old' => 'markdown-to-html.blade.php', 'new' => 'markdown-to-html-converter.blade.php'],
    ['old' => 'qr-generator.blade.php', 'new' => 'qr-code-generator.blade.php'],
    ['old' => 'unicode-encoder.blade.php', 'new' => 'unicode-encoder-decoder.blade.php'], // This one already exists, skip
    ['old' => 'url-encoder.blade.php', 'new' => 'url-encoder-decoder.blade.php'],
];

$renamed = 0;
$skipped = 0;
$errors = 0;

foreach ($renames as $rename) {
    $oldPath = $viewsDir . $rename['old'];
    $newPath = $viewsDir . $rename['new'];

    // Check if old file exists
    if (!file_exists($oldPath)) {
        echo "⚠️  SKIP: {$rename['old']} (doesn't exist)\n";
        $skipped++;
        continue;
    }

    // Check if new file already exists
    if (file_exists($newPath)) {
        echo "⚠️  SKIP: {$rename['old']} => {$rename['new']} (target already exists)\n";
        $skipped++;
        continue;
    }

    // Rename
    if (rename($oldPath, $newPath)) {
        echo "✅ Renamed: {$rename['old']} => {$rename['new']}\n";
        $renamed++;
    } else {
        echo "❌ FAILED: {$rename['old']} => {$rename['new']}\n";
        $errors++;
    }
}

echo "\n" . str_repeat("=", 60) . "\n";
echo "SUMMARY:\n";
echo "Renamed: $renamed\n";
echo "Skipped: $skipped\n";
echo "Errors: $errors\n";
echo str_repeat("=", 60) . "\n";

if ($renamed > 0) {
    echo "\n✅ Renaming complete! Run audit again to verify.\n";
}
