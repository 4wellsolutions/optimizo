<?php

// Rigorous comparison of EN vs DE keys to find missing keys

$langPath = __DIR__ . '/resources/lang';

function getKeysRecursive($array, $prefix = '')
{
    $keys = [];
    foreach ($array as $key => $value) {
        $fullKey = $prefix . ($prefix ? '.' : '') . $key;
        if (is_array($value)) {
            $keys = array_merge($keys, getKeysRecursive($value, $fullKey));
        } else {
            $keys[] = $fullKey;
        }
    }
    return $keys;
}

function loadKeysFromFile($path)
{
    if (!file_exists($path))
        return [];
    $content = json_decode(file_get_contents($path), true);
    if (!$content)
        return [];
    return getKeysRecursive($content);
}

// 1. Analyze Main JSON
echo "=== MAIN FILE (de.json) ===\n";
$enKeys = loadKeysFromFile($langPath . '/en.json');
$deKeys = loadKeysFromFile($langPath . '/de.json');
$missing = array_diff($enKeys, $deKeys);
if (!empty($missing)) {
    echo "❌ Missing " . count($missing) . " keys in de.json:\n";
    foreach ($missing as $k)
        echo "  - $k\n";
} else {
    echo "✅ de.json is 100% complete\n";
}

// 2. Analyze Tools JSONs
echo "\n=== TOOLS FILES ===\n";
$enToolsPath = $langPath . '/en/tools';
$deToolsPath = $langPath . '/de/tools';

$files = glob($enToolsPath . '/*.json');

foreach ($files as $file) {
    $basename = basename($file);
    echo "Checking $basename...\n";

    $enKeys = loadKeysFromFile($file);
    $deKeys = loadKeysFromFile($deToolsPath . '/' . $basename);

    $missing = array_diff($enKeys, $deKeys);

    if (!empty($missing)) {
        echo "  ❌ Missing " . count($missing) . " keys:\n";
        foreach ($missing as $k) {
            echo "    - $k\n";
        }
    } else {
        echo "  ✅ Complete\n";
    }
}
