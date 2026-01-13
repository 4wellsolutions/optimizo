<?php

/**
 * Rename remaining utility view files to match translation slugs
 */

echo "=== FINAL UTILITY VIEW RENAMES ===\n\n";

$viewsDir = __DIR__ . '/resources/views/tools/utility/';

$renames = [
    // CSV converters - add "-converter" suffix
    ['old' => 'csv-to-json.blade.php', 'new' => 'csv-to-json-converter.blade.php'],
    ['old' => 'csv-to-tsv.blade.php', 'new' => 'csv-to-tsv-converter.blade.php'],
    ['old' => 'csv-to-xml.blade.php', 'new' => 'csv-to-xml-converter.blade.php'],

    // JSON converters - add "-converter" suffix  
    ['old' => 'json-to-csv.blade.php', 'new' => 'json-to-csv-converter.blade.php'],
    ['old' => 'json-to-sql.blade.php', 'new' => 'json-to-sql-converter.blade.php'],

    // HTML encoder needs full name
    ['old' => 'html-encoder.blade.php', 'new' => 'html-encoder-decoder.blade.php'], // Check if this exists first

    // Unicode encoder - already has unicode-encoder-decoder, check if we need unicode-encoder
    // URL encoder-decoder already exists
];

$renamed = 0;
$skipped = 0;

foreach ($renames as $rename) {
    $oldPath = $viewsDir . $rename['old'];
    $newPath = $viewsDir . $rename['new'];

    if (!file_exists($oldPath)) {
        echo "⚠️  SKIP: {$rename['old']} (doesn't exist)\n";
        $skipped++;
        continue;
    }

    if (file_exists($newPath)) {
        echo "⚠️  SKIP: {$rename['old']} => {$rename['new']} (target exists)\n";
        $skipped++;
        continue;
    }

    if (rename($oldPath, $newPath)) {
        echo "✅ RENAMED: {$rename['old']} => {$rename['new']}\n";
        $renamed++;
    } else {
        echo "❌ FAILED: {$rename['old']} => {$rename['new']}\n";
    }
}

echo "\n" . str_repeat("=", 60) . "\n";
echo "Renamed: $renamed | Skipped: $skipped\n";
echo str_repeat("=", 60) . "\n";

if ($renamed > 0) {
    echo "\n✅ View files renamed! Now need to update controllers.\n";
}
