<?php

/**
 * Type-Aware JSON Sync & Prune Engine
 * Prevents 500 errors by ensuring array consistency across locales.
 */

require_once 'app/Helpers/TranslationHelper.php';

$locales = ['en', 'ru', 'es'];
$categories = [
    'development',
    'converters',
    'spreadsheet',
    'youtube',
    'seo',
    'utility',
    'time',
    'text',
    'image',
    'document',
    'network'
];

$toolFiles = [];
foreach ($categories as $cat) {
    $dir = "resources/views/tools/$cat";
    if (is_dir($dir)) {
        foreach (glob("$dir/*.blade.php") as $file) {
            $slug = basename($file, '.blade.php');
            $toolFiles[$slug] = [
                'category' => $cat,
                'path' => $file
            ];
        }
    }
}

$masterData = [];
foreach ($toolFiles as $slug => $info) {
    $cat = $info['category'];
    $viewContent = file_get_contents($info['path']);

    // Pattern 1: Simple strings - __tool('slug', 'key.path')
    $pattern = '/__tool\s*\(\s*[\'"]' . preg_quote($slug) . '[\'"]\s*,\s*[\'"]([^\'"]+?)[\'"](?:\s*,\s*[\'"](.*?)[\'"]\s*)?\)/s';
    if (preg_match_all($pattern, $viewContent, $matches)) {
        foreach ($matches[1] as $index => $keyPath) {
            $defaultVal = $matches[2][$index] ?? null;
            if ($defaultVal)
                $defaultVal = stripslashes($defaultVal);
            $masterData[$cat][$slug][$keyPath] = $defaultVal;
        }
    }

    // Pattern 2: Concatenations - __tool('slug', 'prefix.' . $var . '.suffix')
    // We capture the literal parts to use as wildcards
    $concatPattern = '/__tool\s*\(\s*[\'"]' . preg_quote($slug) . '[\'"]\s*,\s*([^\)]+?)\)/s';
    if (preg_match_all($concatPattern, $viewContent, $matches)) {
        foreach ($matches[1] as $rawArgs) {
            if (strpos($rawArgs, '.') !== false || strpos($rawArgs, '$') !== false) {
                // Extract all quoted parts
                if (preg_match_all('/[\'"]([^\'"]+?)[\'"]/', $rawArgs, $stringMatches)) {
                    foreach ($stringMatches[1] as $part) {
                        if ($part !== $slug) {
                            // Trim dots from ends to get clean prefixes/suffixes
                            $cleanPart = trim($part, '.');
                            if ($cleanPart) {
                                $masterData[$cat][$slug]["$cleanPart.*"] = true; // Mark as wildcard
                            }
                        }
                    }
                }
            }
        }
    }

    if (preg_match_all('/__t\s*\(\s*.*?,?\s*[\'"]([^\'"]+?)[\'"]\s*\)/', $viewContent, $matches)) {
        foreach ($matches[1] as $keyPath) {
            $masterData[$cat][$slug][$keyPath] = null;
        }
    }

    foreach (['meta.title', 'meta.description', 'meta.h1', 'meta.subtitle'] as $hk) {
        if (!isset($masterData[$cat][$slug][$hk]))
            $masterData[$cat][$slug][$hk] = null;
    }
}

// 1. First Pass: Sync English (Source of Truth for types)
$enData = [];
foreach ($categories as $cat) {
    $jsonPath = "resources/lang/en/tools/$cat.json";
    $existing = file_get_contents($jsonPath);
    $existing = json_decode($existing, true) ?: [];

    $newData = [];
    if (isset($masterData[$cat])) {
        foreach ($masterData[$cat] as $slug => $keys) {
            // Collect all existing keys for this slug
            $existingSlugData = $existing[$slug] ?? [];
            $allExistingKeys = flattenArray($existingSlugData);

            // Add literal keys from masterData
            foreach ($keys as $keyPath => $defaultFromBlade) {
                if (strpos($keyPath, '*') !== false)
                    continue; // Skip wildcards here
                $val = getNestedValue($existing, "$slug.$keyPath");
                if ($val === null || (is_string($val) && strpos($val, '[Pending Translation') !== false)) {
                    $val = $defaultFromBlade ?? "[Pending Translation: $keyPath]";
                }
                setNestedValue($newData[$slug], $keyPath, $val);
            }

            // Restore keys matching wildcards
            foreach ($keys as $keyPath => $dummy) {
                if (strpos($keyPath, '*') === false)
                    continue;
                $prefix = str_replace('*', '', $keyPath);
                foreach ($allExistingKeys as $existingKey) {
                    if (strpos($existingKey, $prefix) === 0) {
                        $val = getNestedValue($existing, "$slug.$existingKey");
                        setNestedValue($newData[$slug], $existingKey, $val);
                    }
                }
            }
        }
    }
    ksort($newData);
    file_put_contents($jsonPath, json_encode($newData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    $enData[$cat] = $newData;
}

// 2. Second Pass: Sync Other Locales with type-safety
foreach (['ru', 'es'] as $locale) {
    echo "Processing locale: $locale\n";
    foreach ($categories as $cat) {
        $jsonPath = "resources/lang/$locale/tools/$cat.json";
        $existing = file_exists($jsonPath) ? json_decode(file_get_contents($jsonPath), true) : [];

        $newData = [];
        if (isset($enData[$cat])) {
            foreach ($enData[$cat] as $slug => $keys) {
                $flatKeys = flattenArray($keys);
                foreach ($flatKeys as $keyPath) {
                    $existingVal = getNestedValue($existing, "$slug.$keyPath");
                    $englishVal = getNestedValue($enData[$cat], "$slug.$keyPath");

                    $val = $existingVal;
                    if ($val === null || (is_string($val) && strpos($val, '[Pending Translation') !== false)) {
                        if (is_array($englishVal)) {
                            $val = []; // Safety: ensure it's an array to prevent 500 errors in Blade
                        } else {
                            $val = "[Pending Translation: $keyPath]";
                        }
                    }
                    setNestedValue($newData[$slug], $keyPath, $val);
                }
            }
        }
        ksort($newData);
        file_put_contents($jsonPath, json_encode($newData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        echo "  [OK] Synchronized $cat.json\n";
    }
}

function flattenArray($array, $prefix = '')
{
    $result = [];
    if (!is_array($array))
        return [];
    foreach ($array as $key => $value) {
        if (is_array($value) && !empty($value)) {
            $result = array_merge($result, flattenArray($value, $prefix . $key . '.'));
        } else {
            $result[] = $prefix . $key;
        }
    }
    return $result;
}

function getNestedValue($array, $path)
{
    if (!$path)
        return null;
    $keys = explode('.', $path);
    foreach ($keys as $key) {
        if (!is_array($array) || !isset($array[$key]))
            return null;
        $array = $array[$key];
    }
    return $array;
}

function setNestedValue(&$array, $path, $value)
{
    $keys = explode('.', $path);
    foreach ($keys as $key) {
        if (!isset($array[$key]) || !is_array($array[$key]))
            $array[$key] = [];
        $array = &$array[$key];
    }
    $array = $value;
}

echo "Sync completed!\n";
