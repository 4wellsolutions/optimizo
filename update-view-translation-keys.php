<?php

/**
 * Update all renamed view files to use correct translation keys
 */

echo "=== UPDATING VIEW FILES WITH CORRECT TRANSLATION KEYS ===\n\n";

$updates = [
    'json-to-yaml-converter.blade.php' => ['old' => 'json-to-yaml', 'new' => 'json-to-yaml-converter'],
    'markdown-to-html-converter.blade.php' => ['old' => 'markdown-to-html', 'new' => 'markdown-to-html-converter'],
    'qr-code-generator.blade.php' => ['old' => 'qr-generator', 'new' => 'qr-code-generator'],
    'url-encoder-decoder.blade.php' => ['old' => 'url-encoder', 'new' => 'url-encoder-decoder'],
    'csv-to-json-converter.blade.php' => ['old' => 'csv-to-json', 'new' => 'csv-to-json-converter'],
    'csv-to-tsv-converter.blade.php' => ['old' => 'csv-to-tsv', 'new' => 'csv-to-tsv-converter'],
    'csv-to-xml-converter.blade.php' => ['old' => 'csv-to-xml', 'new' => 'csv-to-xml-converter'],
    'json-to-csv-converter.blade.php' => ['old' => 'json-to-csv', 'new' => 'json-to-csv-converter'],
    'json-to-sql-converter.blade.php' => ['old' => 'json-to-sql', 'new' => 'json-to-sql-converter'],
];

$viewsDir = __DIR__ . '/resources/views/tools/utility/';
$updated = 0;

foreach ($updates as $file => $keys) {
    $filepath = $viewsDir . $file;

    if (!file_exists($filepath)) {
        echo "⚠️  File not found: $file\n";
        continue;
    }

    $content = file_get_contents($filepath);
    $oldKey = $keys['old'];
    $newKey = $keys['new'];

    // Replace __tool('old-key' with __tool('new-key'
    $newContent = str_replace("__tool('$oldKey'", "__tool('$newKey'", $content);

    if ($content !== $newContent) {
        file_put_contents($filepath, $newContent);
        echo "✅ Updated: $file ($oldKey → $newKey)\n";
        $updated++;
    } else {
        echo "⏭️  No changes: $file\n";
    }
}

echo "\n" . str_repeat("=", 70) . "\n";
echo "Total view files updated: $updated\n";
echo str_repeat("=", 70) . "\n";

if ($updated > 0) {
    echo "\n✅ All view files now use correct translation keys!\n";
}
