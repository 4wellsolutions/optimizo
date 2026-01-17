<?php

$locales = ['ru', 'es'];
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

$pendingData = [];

foreach ($categories as $cat) {
    $enPath = "resources/lang/en/tools/$cat.json";
    if (!file_exists($enPath))
        continue;
    $enData = json_decode(file_get_contents($enPath), true);

    foreach ($locales as $loc) {
        $locPath = "resources/lang/$loc/tools/$cat.json";
        if (!file_exists($locPath))
            continue;
        $locData = json_decode(file_get_contents($locPath), true);

        array_walk_recursive($locData, function ($value, $keyPathFull) use ($enData, $loc, $cat, &$pendingData) {
            // Note: array_walk_recursive doesn't give us the full path easily.
            // We'll need a different approach.
        });

        $flatLoc = flatten($locData);
        foreach ($flatLoc as $path) {
            $val = getNested($locData, $path);
            if (is_string($val) && strpos($val, '[Pending Translation') !== false) {
                $enVal = getNested($enData, $path);
                if ($enVal !== null) {
                    $pendingData[$loc][$cat][$path] = $enVal;
                }
            }
        }
    }
}

file_put_contents('pending_strings.json', json_encode($pendingData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "Extracted pending strings to pending_strings.json\n";

function flatten($array, $prefix = '')
{
    $result = [];
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, flatten($value, $prefix . $key . '.'));
        } else {
            $result[] = $prefix . $key;
        }
    }
    return $result;
}

function getNested($array, $path)
{
    $keys = explode('.', $path);
    foreach ($keys as $key) {
        if (!is_array($array) || !isset($array[$key]))
            return null;
        $array = $array[$key];
    }
    return $array;
}
