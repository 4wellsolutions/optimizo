<?php
// Debug script to simulate AdminTranslationReportController logic

$langPath = 'resources/lang';
$englishKeys = loadKeys($langPath . '/en', $langPath, 'en');
$germanKeys = loadKeys($langPath . '/de', $langPath, 'de');

echo "English Main File Keys (en.json): " . (isset($englishKeys['en.json']) ? count($englishKeys['en.json']) : 0) . "\n";
echo "German Main File Keys (de.json): " . (isset($germanKeys['de.json']) ? count($germanKeys['de.json']) : 0) . "\n";

if (isset($englishKeys['en.json']) && isset($germanKeys['de.json'])) {
    $refKeys = $englishKeys['en.json'];
    $targetKeys = $germanKeys['de.json'];

    $translated = 0;
    $missing = 0;
    foreach ($refKeys as $key) {
        if (in_array($key, $targetKeys)) {
            $translated++;
        } else {
            $missing++;
            if ($missing <= 5)
                echo "Missing key in DE: $key\n";
        }
    }
    echo "Translated: $translated\n";
    echo "Missing: $missing\n";
} else {
    echo "Files invalid or missing.\n";
    if (!file_exists($langPath . '/en.json'))
        echo "en.json missing\n";
    if (!file_exists($langPath . '/de.json'))
        echo "de.json missing\n";
}

function getKeysRecursive($array, $prefix = '')
{
    $keys = [];
    foreach ($array as $key => $value) {
        $fullKey = $prefix . ($prefix ? '.' : '') . $key;
        if (is_array($value)) {
            $keys = array_merge($keys, $getKeysRecursive($value, $fullKey));
        } else {
            $keys[] = $fullKey;
        }
    }
    return $keys;
}

function loadAllKeys($localeDir, $langPath, $locale)
{
    // Simplified version of controller logic
    $allKeys = [];
    $mainJson = $langPath . '/' . $locale . '.json';
    if (file_exists($mainJson)) {
        $content = json_decode(file_get_contents($mainJson), true) ?? [];
        $allKeys[$locale . '.json'] = getKeysRecursive($content);
    }
    return $allKeys;
}

// Fixed function name to match call
function loadKeys($localeDir, $langPath, $locale)
{
    return loadAllKeys($localeDir, $langPath, $locale);
}
