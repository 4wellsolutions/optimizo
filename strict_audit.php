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

$results = [];

foreach ($categories as $cat) {
    $enPath = "resources/lang/en/tools/$cat.json";
    if (!file_exists($enPath))
        continue;

    $enData = json_decode(file_get_contents($enPath), true);
    $enKeys = flatten($enData);

    foreach ($locales as $loc) {
        $locPath = "resources/lang/$loc/tools/$cat.json";
        $locData = file_exists($locPath) ? json_decode(file_get_contents($locPath), true) : [];
        $locKeys = flatten($locData);

        $missing = array_diff($enKeys, $locKeys);
        $pending = [];

        foreach ($locKeys as $key) {
            $val = getNested($locData, $key);
            if (is_string($val) && (strpos($val, '[Pending Translation]') !== false || strpos($val, '[Pending Translation:') !== false)) {
                $pending[] = $key;
            }
        }

        if (!empty($missing) || !empty($pending)) {
            $results[$cat][$loc] = [
                'missing' => $missing,
                'pending' => $pending
            ];
        }
    }
}

if (empty($results)) {
    echo "No missing or pending translations found!\n";
} else {
    foreach ($results as $cat => $localesData) {
        echo "Category: $cat\n";
        foreach ($localesData as $loc => $info) {
            echo "  Locale: $loc\n";
            if (!empty($info['missing'])) {
                echo "    Missing Keys (" . count($info['missing']) . "):\n";
                foreach ($info['missing'] as $mk)
                    echo "      - $mk\n";
            }
            if (!empty($info['pending'])) {
                echo "    Pending Keys (" . count($info['pending']) . "):\n";
                foreach ($info['pending'] as $pk)
                    echo "      - $pk\n";
            }
        }
    }
}

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
