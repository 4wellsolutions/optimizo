<?php

// This script will add all the missing converters to the English converters.php file
// Run this after the weight-converter entry

$convertersToAdd = [
    'decimal-binary-converter',
    'decimal-hex-converter',
    'rgb-hex-converter',
    'case-converter',
    'ascii-converter',
    'sentence-case-converter',
    'camel-case-converter',
    'kebab-case-converter',
    'pascal-case-converter',
    'snake-case-converter',
    'binary-hex-converter',
    'studly-case-converter',
];

echo "Converters to add:\n";
foreach ($convertersToAdd as $converter) {
    echo "- $converter\n";
}

echo "\nTotal: " . count($convertersToAdd) . " converters\n";
