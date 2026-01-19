<?php
$en = json_decode(file_get_contents('resources/lang/en/tools/youtube.json'), true);
$ru = json_decode(file_get_contents('resources/lang/ru/tools/youtube.json'), true);

function getKeys($arr, $prefix = '')
{
    $keys = [];
    foreach ($arr as $k => $v) {
        if (is_array($v)) {
            $keys = array_merge($keys, getKeys($v, $prefix . $k . '.'));
        } else {
            $keys[] = $prefix . $k;
        }
    }
    return $keys;
}

$enKeys = getKeys($en);
$ruKeys = getKeys($ru);

$missingRu = array_diff($enKeys, $ruKeys);
$extraRu = array_diff($ruKeys, $enKeys);

if (empty($missingRu) && empty($extraRu)) {
    echo "SUCCESS: Keys match exactly!\n";
} else {
    if (!empty($missingRu)) {
        echo "MISSING in RU:\n";
        print_r($missingRu);
    }
    if (!empty($extraRu)) {
        echo "EXTRA in RU:\n";
        print_r($extraRu);
    }
}
