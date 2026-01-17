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

echo str_pad("Tool", 30) . " | Loc | Total | Missing | Pending | % Done\n";
echo str_repeat("-", 80) . "\n";

foreach ($categories as $cat) {
    $enPath = "resources/lang/en/tools/$cat.json";
    if (!file_exists($enPath))
        continue;

    $enData = json_decode(file_get_contents($enPath), true);

    foreach ($enData as $slug => $slugData) {
        $enKeys = flatten($slugData);
        $total = count($enKeys);

        foreach ($locales as $loc) {
            $locPath = "resources/lang/$loc/tools/$cat.json";
            $locData = file_exists($locPath) ? json_decode(file_get_contents($locPath), true) : [];
            $locSlugData = $locData[$slug] ?? [];
            $locKeys = flatten($locSlugData);

            $missing = array_diff($enKeys, $locKeys);
            $pending = 0;

            foreach ($locKeys as $key) {
                $val = getNested($locSlugData, $key);
                if (is_string($val) && (strpos($val, '[Pending Translation]') !== false || strpos($val, '[Pending Translation:') !== false)) {
                    $pending++;
                }
            }

            $missingCount = count($missing);
            $doneCount = $total - $missingCount - $pending;
            $percent = $total > 0 ? round(($doneCount / $total) * 100) : 100;

            if ($percent < 100) {
                echo str_pad($slug, 30) . " | $loc | " . str_pad($total, 5) . " | " . str_pad($missingCount, 7) . " | " . str_pad($pending, 7) . " | $percent%\n";
            }
        }
    }
}

function flatten($array, $prefix = '')
{
    $result = [];
    if (!is_array($array))
        return [];
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
