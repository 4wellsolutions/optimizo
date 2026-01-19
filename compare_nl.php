<?php

$lang = 'nl';
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

function compareKeys($enArr, $nlArr, $prefix = '')
{
    $missing = [];
    foreach ($enArr as $key => $value) {
        $fullKey = $prefix ? "$prefix.$key" : $key;
        if (!isset($nlArr[$key])) {
            $missing[] = $fullKey;
        } elseif (is_array($value)) {
            if (!is_array($nlArr[$key])) {
                $missing[] = $fullKey . " (Type mismatch: EN is array, NL is not)";
            } else {
                $missing = array_merge($missing, compareKeys($value, $nlArr[$key], $fullKey));
            }
        } else {
            if (is_string($nlArr[$key]) && strpos($nlArr[$key], '[Pending Translation]') !== false) {
                $missing[] = $fullKey . " (Pending translation)";
            }
        }
    }
    return $missing;
}

foreach ($files as $file) {
    echo "$file: ";
    $enPath = "resources/lang/en/tools/$file";
    $nlPath = "resources/lang/$lang/tools/$file";

    if (!file_exists($enPath)) {
        echo "EN file missing\n";
        continue;
    }
    if (!file_exists($nlPath)) {
        echo "NL file missing\n";
        continue;
    }

    $en = json_decode(file_get_contents($enPath), true);
    $nl = json_decode(file_get_contents($nlPath), true);

    if ($en === null) {
        echo "Error decoding EN JSON\n";
        continue;
    }
    if ($nl === null) {
        echo "Error decoding NL JSON\n";
        continue;
    }

    $missingKeys = compareKeys($en, $nl);

    if (empty($missingKeys)) {
        echo "OK\n";
    } else {
        echo count($missingKeys) . " missing keys\n";
        foreach ($missingKeys as $mKey) {
            echo "  - $mKey\n";
        }
    }
}
