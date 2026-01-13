<?php

$en = require 'd:/workspace/optimizo/resources/lang/en/tools/utilities.php';
$ru = require 'd:/workspace/optimizo/resources/lang/ru/tools/utilities.php';

$enKeys = array_keys($en);
$ruKeys = array_keys($ru);

$missingInRu = array_diff($enKeys, $ruKeys);

echo "Missing in RU (" . count($missingInRu) . "):\n";
print_r($missingInRu);

echo "\nChecking specific suspect tools in RU:\n";
$suspects = ['xml-formatter', 'url-encoder', 'user-agent-parser', 'yaml-to-json', 'json-to-xml', 'word-to-pdf'];
foreach ($suspects as $slug) {
    if (array_key_exists($slug, $ru)) {
        echo "[OK] $slug found in utilities.php (RU)\n";
    } else {
        echo "[MISSING] $slug NOT found in utilities.php (RU)\n";
    }
}
