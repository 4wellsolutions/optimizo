<?php
// Debug document.json keys specifically

$en = json_decode(file_get_contents('resources/lang/en/tools/document.json'), true);
$de = json_decode(file_get_contents('resources/lang/de/tools/document.json'), true);

$enKeys = array_keys($en);
$deKeys = array_keys($de);

echo "EN Keys: " . count($enKeys) . "\n";
echo "DE Keys: " . count($deKeys) . "\n";

$diff = array_diff($enKeys, $deKeys);
echo "Diff in Top Keys: " . implode(', ', $diff) . "\n";

// Function to diff deep
function diffArray($arr1, $arr2, $path = '')
{
    foreach ($arr1 as $k => $v) {
        $currPath = $path ? "$path.$k" : $k;
        if (!isset($arr2[$k])) {
            echo "MISSING in DE: $currPath\n";
        } elseif (is_array($v) && is_array($arr2[$k])) {
            diffArray($v, $arr2[$k], $currPath);
        }
    }
}

echo "\nDeep Scan of document.json:\n";
diffArray($en, $de);

// Also check text.json for that specific key
echo "\nChecking text.json for morse example:\n";
$enText = json_decode(file_get_contents('resources/lang/en/tools/text.json'), true);
$deText = json_decode(file_get_contents('resources/lang/de/tools/text.json'), true);

if (isset($enText['morse-to-text-converter']['content']['examples_title'])) {
    if (!isset($deText['morse-to-text-converter']['content']['examples_title'])) {
        echo "MISSING in DE text.json: morse-to-text-converter.content.examples_title\n";
    } else {
        echo "FOUND in DE text.json: morse-to-text-converter.content.examples_title\n";
    }
}
