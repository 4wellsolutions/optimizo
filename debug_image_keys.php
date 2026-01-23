<?php
// Debug image.json keys specifically

$en = json_decode(file_get_contents('resources/lang/en/tools/image.json'), true);
$de = json_decode(file_get_contents('resources/lang/de/tools/image.json'), true);

function diffArray($arr1, $arr2, $path = '')
{
    foreach ($arr1 as $k => $v) {
        $currPath = $path ? "$path.$k" : $k;
        if (!isset($arr2[$k])) {
            echo "$currPath\n";
        } elseif (is_array($v) && is_array($arr2[$k])) {
            diffArray($v, $arr2[$k], $currPath);
        }
    }
}

echo "MISSING in DE image.json:\n";
diffArray($en, $de);
