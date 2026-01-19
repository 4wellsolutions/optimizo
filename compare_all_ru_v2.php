<?php
$files = [
    'converters.json',
    'development.json',
    'document.json',
    'image.json',
    'network.json',
    'seo.json',
    'spreadsheet.json',
    'text.json',
    'time.json',
    'utility.json',
    'youtube.json'
];

function getKeys($arr, $prefix = '')
{
    $keys = [];
    if (!is_array($arr))
        return $keys;
    foreach ($arr as $k => $v) {
        if (is_array($v)) {
            $keys = array_merge($keys, getKeys($v, $prefix . $k . '.'));
        } else {
            $keys[] = $prefix . $k;
        }
    }
    return $keys;
}

foreach ($files as $file) {
    $enPath = "resources/lang/en/tools/$file";
    $ruPath = "resources/lang/ru/tools/$file";

    if (!file_exists($ruPath)) {
        echo "$file: RU FILE MISSING\n";
        continue;
    }

    $en = json_decode(file_get_contents($enPath), true);
    $ru = json_decode(file_get_contents($ruPath), true);

    $enKeys = getKeys($en);
    $ruKeys = getKeys($ru);

    $missingRu = array_diff($enKeys, $ruKeys);
    if (!empty($missingRu)) {
        echo "$file: " . count($missingRu) . " missing keys\n";
        foreach ($missingRu as $key) {
            echo "  - $key\n";
        }
    } else {
        echo "$file: OK\n";
    }
}
