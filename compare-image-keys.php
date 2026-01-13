<?php

/**
 * Verify and compare image tool keys across all languages
 */

$enFile = __DIR__ . '/resources/lang/en/tools/images.php';
$esFile = __DIR__ . '/resources/lang/es/tools/images.php';
$ruFile = __DIR__ . '/resources/lang/ru/tools/images.php';

$enKeys = array_keys(include $enFile);
$esKeys = array_keys(include $esFile);
$ruKeys = array_keys(include $ruFile);

echo "\n=== IMAGE TOOLS KEY COMPARISON ===\n\n";

echo "EN tools: " . count($enKeys) . "\n";
echo "ES tools: " . count($esKeys) . "\n";
echo "RU tools: " . count($ruKeys) . "\n\n";

// Find keys only in EN
$enOnly = array_diff($enKeys, $esKeys, $ruKeys);
if ($enOnly) {
    echo "⚠️  Keys ONLY in EN:\n";
    foreach ($enOnly as $key)
        echo "  - $key\n";
    echo "\n";
}

// Find keys only in ES
$esOnly = array_diff($esKeys, $enKeys, $ruKeys);
if ($esOnly) {
    echo "⚠️  Keys ONLY in ES:\n";
    foreach ($esOnly as $key)
        echo "  - $key\n";
    echo "\n";
}

// Find keys only in RU
$ruOnly = array_diff($ruKeys, $enKeys, $esKeys);
if ($ruOnly) {
    echo "⚠️  Keys ONLY in RU:\n";
    foreach ($ruOnly as $key)
        echo "  - $key\n";
    echo "\n";
}

// Find common keys
$common = array_intersect($enKeys, $esKeys, $ruKeys);
echo "✅ Common keys across all languages: " . count($common) . "\n\n";

if (count($common) > 0) {
    echo "Common keys:\n";
    foreach ($common as $key) {
        echo "  - $key\n";
    }
}

// Find keys in EN but not in ES
$missingInES = array_diff($enKeys, $esKeys);
if ($missingInES) {
    echo "\n⚠️  Missing in ES:\n";
    foreach ($missingInES as $key)
        echo "  - $key\n";
}

// Find keys in EN but not in RU  
$missingInRU = array_diff($enKeys, $ruKeys);
if ($missingInRU) {
    echo "\n⚠️  Missing in RU:\n";
    foreach ($missingInRU as $key)
        echo "  - $key\n";
}

echo "\n=== RECOMMENDATION ===\n";
if (count($enKeys) === count($esKeys) && count($enKeys) === count($ruKeys) && count($common) === count($enKeys)) {
    echo "✅ All files have matching keys!\n";
} else {
    echo "⚠️  Key mismatches found. Need to synchronize translation files.\n";
}
