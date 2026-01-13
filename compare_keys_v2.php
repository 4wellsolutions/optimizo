<?php

$en = require 'd:/workspace/optimizo/resources/lang/en/tools/utilities.php';
$ru = require 'd:/workspace/optimizo/resources/lang/ru/tools/utilities.php';

$enKeys = array_keys($en);
$ruKeys = array_keys($ru);

$missingInRu = array_diff($enKeys, $ruKeys);

file_put_contents('missing_keys_list.txt', implode("\n", $missingInRu));

echo "Count: " . count($missingInRu) . "\n";
