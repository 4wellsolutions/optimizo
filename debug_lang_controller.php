<?php

// Simulate AdminTranslationReportController directory scanning logic

$langPath = __DIR__ . '/resources/lang';
// Fix path for Windows consistency in this script if needed, but let's try to mimic controller
// $langPath = realpath($langPath); 

$locales = array_filter(glob($langPath . '/*'), 'is_dir');

echo "Lang Path: $langPath\n";
echo "Found Locales: " . count($locales) . "\n";
foreach ($locales as $l)
    echo " - $l\n";

// Load English Keys first
$englishKeys = loadAllKeys($langPath . '/en', $langPath, 'en');
echo "\nEnglish Files Found: " . count($englishKeys) . "\n";
foreach (array_keys($englishKeys) as $f)
    echo " - $f\n";

// Load German Keys
$localeDir = $langPath . '/de';
$germanKeys = loadAllKeys($localeDir, $langPath, 'de');
echo "\nGerman Files Found: " . count($germanKeys) . "\n";
foreach (array_keys($germanKeys) as $f)
    echo " - $f\n";

echo "\nComparing...\n";

foreach ($englishKeys as $fileName => $refKeys) {
    echo "FILE: $fileName\n";
    if (isset($germanKeys[$fileName])) {
        echo "  Found in German!\n";
        $translated = 0;
        foreach ($refKeys as $key) {
            if (in_array($key, $germanKeys[$fileName])) {
                $translated++;
            }
        }
        echo "  - Ref Keys: " . count($refKeys) . "\n";
        echo "  - Matched: $translated\n";
    } else {
        echo "  MISSING in German array keys.\n";
        // Check fuzzy match
        foreach (array_keys($germanKeys) as $gk) {
            if ($gk === $fileName)
                echo "  (But exact string match found?)\n";
            if (str_replace('\\', '/', $gk) === str_replace('\\', '/', $fileName))
                echo "  (Matches if slashes normalized)\n";
        }
    }
}


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

    // Main JSON
    $mainJson = $langPath . '/' . $locale . '.json';
    if (file_exists($mainJson)) {
        // echo "Loading main json: $mainJson\n";
        $content = json_decode(file_get_contents($mainJson), true) ?? [];
        $allKeys[$locale . '.json'] = getKeysRecursive($content);
    }

    // Sub directories
    if (is_dir($localeDir)) {
        $directory = new RecursiveDirectoryIterator($localeDir);
        $iterator = new RecursiveIteratorIterator($directory);
        $jsonFiles = new RegexIterator($iterator, '/^.+\.json$/i', RecursiveRegexIterator::GET_MATCH);

        foreach ($jsonFiles as $file) {
            $filePath = $file[0];
            // THIS LINE IS THE SUSPECT:
            $relativePath = str_replace($localeDir . DIRECTORY_SEPARATOR, '', $filePath);

            // Debug the path calc
            // echo "Path: $filePath\n";
            // echo "Dir:  $localeDir" . DIRECTORY_SEPARATOR . "\n";
            // echo "Rel:  $relativePath\n";

            $allKeys[$relativePath] = getKeysRecursive(json_decode(file_get_contents($filePath), true) ?? []);
        }
    }

    return $allKeys;
}
