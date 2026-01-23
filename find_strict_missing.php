<?php

// Strict comparison for specific files shown in screenshots

$files = ['tools/document.json', 'tools/image.json', 'tools/text.json'];
$base = 'resources/lang';

function getKeys($path)
{
    if (!file_exists($path))
        return [];
    $data = json_decode(file_get_contents($path), true);
    return flatten($data);
}

function flatten($array, $prefix = '')
{
    $result = [];
    foreach ($array as $key => $value) {
        $fullKey = $prefix . ($prefix ? '.' : '') . $key;
        if (is_array($value)) {
            $result = array_merge($result, flatten($value, $fullKey));
        } else {
            $result[] = $fullKey;
        }
    }
    return $result;
}

foreach ($files as $f) {
    echo "\n=== $f ===\n";
    $enKeys = getKeys("$base/en/$f");
    $deKeys = getKeys("$base/de/$f");

    $missing = array_diff($enKeys, $deKeys);

    echo "EN: " . count($enKeys) . " | DE: " . count($deKeys) . "\n";

    if (!empty($missing)) {
        header("ERROR", true); // Just to standout
        foreach ($missing as $k) {
            echo "MISSING: $k\n";
        }
    } else {
        echo "✅ Complete\n";
    }
}
