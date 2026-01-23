<?php

// Verify if the fix works by simulating the PATCHED controller logic

$langPath = __DIR__ . '/resources/lang';
$englishKeys = loadAllKeys($langPath . '/en', $langPath, 'en');
$localeDir = $langPath . '/de';
$germanKeys = loadAllKeys($localeDir, $langPath, 'de');

$locale = 'de';

echo "Simulating comparison for DE...\n";

$totalRef = 0;
$totalTrans = 0;

foreach ($englishKeys as $fileName => $refKeys) {
    $translated = 0;

    // THE FIX:
    $targetFileName = $fileName;
    if ($fileName === 'en.json') {
        $targetFileName = $locale . '.json';
    }

    if (isset($germanKeys[$targetFileName])) {
        foreach ($refKeys as $key) {
            if (in_array($key, $germanKeys[$targetFileName])) {
                $translated++;
            }
        }
        echo "✅ Found $targetFileName (mapped from $fileName): $translated / " . count($refKeys) . "\n";
    } else {
        echo "❌ MISSING $targetFileName (mapped from $fileName)\n";
    }

    $totalRef += count($refKeys);
    $totalTrans += $translated;
}

echo "\nTotal Progress: $totalTrans / $totalRef (" . round(($totalTrans / $totalRef) * 100, 2) . "%)\n";


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

function loadAllKeys($localeDir, $langPath, $locale)
{
    $allKeys = [];
    $mainJson = $langPath . '/' . $locale . '.json';
    if (file_exists($mainJson)) {
        $content = json_decode(file_get_contents($mainJson), true) ?? [];
        $allKeys[$locale . '.json'] = getKeysRecursive($content);
    }
    if (is_dir($localeDir)) {
        $directory = new RecursiveDirectoryIterator($localeDir);
        $iterator = new RecursiveIteratorIterator($directory);
        $jsonFiles = new RegexIterator($iterator, '/^.+\.json$/i', RecursiveRegexIterator::GET_MATCH);
        foreach ($jsonFiles as $file) {
            $filePath = $file[0];
            $relativePath = str_replace($localeDir . DIRECTORY_SEPARATOR, '', $filePath);
            $allKeys[$relativePath] = getKeysRecursive(json_decode(file_get_contents($filePath), true) ?? []);
        }
    }
    return $allKeys;
}
