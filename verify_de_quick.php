<?php
// Quick verification of German files
$files = ['converters.json', 'development.json', 'spreadsheet.json', 'youtube.json'];
$totalEmpty = 0;

foreach ($files as $file) {
    $path = "resources/lang/de/tools/$file";
    $content = file_get_contents($path);
    $data = json_decode($content, true);

    $empty = 0;
    array_walk_recursive($data, function ($value) use (&$empty) {
        if ($value === '' || $value === null)
            $empty++;
    });

    echo "$file: $empty empty keys\n";
    $totalEmpty += $empty;
}

echo "\nTotal empty keys: $totalEmpty\n";
echo ($totalEmpty === 0 ? "✅ ALL COMPLETE!" : "⚠️  Still has empty keys");
