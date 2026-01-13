<?php

/**
 * COMPREHENSIVE FIX: Sync image tool keys and add subtitles
 * EN is source of truth - will list all EN keys
 */

// Get EN keys as source of truth
$enKeys = array_keys(include __DIR__ . '/resources/lang/en/tools/images.php');

echo "\n=== EN IMAGE TOOL KEYS (Source of Truth) ===\n";
foreach ($enKeys as $key) {
    echo "  - $key\n";
}
echo "\nTotal EN keys: " . count($enKeys) . "\n";

// Also check ES and RU
$esKeys = array_keys(include __DIR__ . '/resources/lang/es/tools/images.php');
$ruKeys = array_keys(include __DIR__ . '/resources/lang/ru/tools/images.php');

echo "\nTotal ES keys: " . count($esKeys) . "\n";
echo "Total RU keys: " . count($ruKeys) . "\n";

// Find differences
$missingInES = array_diff($enKeys, $esKeys);
$missingInRU = array_diff($enKeys, $ruKeys);

if ($missingInES) {
    echo "\n⚠️  Missing in ES:\n";
    foreach ($missingInES as $key)
        echo "  - $key\n";
}

if ($missingInRU) {
    echo "\n⚠️  Missing in RU:\n";
    foreach ($missingInRU as $key)
        echo "  - $key\n";
}
