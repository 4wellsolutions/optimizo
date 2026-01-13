<?php

$file = 'd:/workspace/optimizo/resources/lang/ru/tools/utilities.php';
$lines = file($file);
$suspects = ['xml-formatter', 'url-encoder', 'user-agent-parser', 'yaml-to-json', 'json-to-xml'];

foreach ($lines as $lineNum => $line) {
    foreach ($suspects as $slug) {
        if (strpos($line, "'$slug'") !== false || strpos($line, "\"$slug\"") !== false) {
            echo "Found $slug at line " . ($lineNum + 1) . "\n";
        }
    }
}
