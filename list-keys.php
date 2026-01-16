<?php

$converters = include 'resources/lang/en/tools/converters.php';
$development = include 'resources/lang/en/tools/development.php';
$text = include 'resources/lang/en/tools/text.php';

echo "CONVERTERS.PHP TOOLS:\n";
echo str_repeat('=', 50) . "\n";
foreach (array_keys($converters) as $key) {
    echo "$key\n";
}

echo "\n\nDEVELOPMENT.PHP TOOLS:\n";
echo str_repeat('=', 50) . "\n";
foreach (array_keys($development) as $key) {
    echo "$key\n";
}

echo "\n\nTEXT.PHP TOOLS:\n";
echo str_repeat('=', 50) . "\n";
foreach (array_keys($text) as $key) {
    echo "$key\n";
}
