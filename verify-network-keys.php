<?php

/**
 * Comprehensive Network Tools Key Verification & Subtitle Addition
 * Step 1: Verify keys match across EN, ES, RU
 * Step 2: Fix any mismatches
 * Step 3: Add subtitles
 */

echo "=== STEP 1: KEY VERIFICATION ===\n\n";

$enFile = __DIR__ . '/resources/lang/en/tools/network.php';
$esFile = __DIR__ . '/resources/lang/es/tools/network.php';
$ruFile = __DIR__ . '/resources/lang/ru/tools/network.php';

$enKeys = array_keys(include $enFile);
$esKeys = array_keys(include $esFile);
$ruKeys = array_keys(include $ruFile);

echo "EN keys: " . count($enKeys) . "\n";
echo "ES keys: " . count($esKeys) . "\n";
echo "RU keys: " . count($ruKeys) . "\n\n";

// Check if all match
if ($enKeys === $esKeys && $enKeys === $ruKeys) {
    echo "✅ ALL KEYS MATCH PERFECTLY!\n\n";
    $keysMatch = true;
} else {
    echo "⚠️  KEY MISMATCHES FOUND\n\n";
    $keysMatch = false;

    // Show EN keys (source of truth)
    echo "EN Keys (Source of Truth):\n";
    foreach ($enKeys as $i => $key) {
        echo "  " . ($i + 1) . ". $key\n";
    }

    // Check ES
    $missingInES = array_diff($enKeys, $esKeys);
    $extraInES = array_diff($esKeys, $enKeys);

    if ($missingInES || $extraInES) {
        echo "\nES Issues:\n";
        if ($missingInES) {
            echo "  Missing: " . implode(', ', $missingInES) . "\n";
        }
        if ($extraInES) {
            echo "  Extra: " . implode(', ', $extraInES) . "\n";
        }
    }

    // Check RU
    $missingInRU = array_diff($enKeys, $ruKeys);
    $extraInRU = array_diff($ruKeys, $enKeys);

    if ($missingInRU || $extraInRU) {
        echo "\nRU Issues:\n";
        if ($missingInRU) {
            echo "  Missing: " . implode(', ', $missingInRU) . "\n";
        }
        if ($extraInRU) {
            echo "  Extra: " . implode(', ', $extraInRU) . "\n";
        }
    }
}

echo "\n=== RECOMMENDATION ===\n";
if ($keysMatch) {
    echo "✅ Ready to add subtitles!\n";
} else {
    echo "⚠️  Fix key mismatches first before adding subtitles\n";
}

// Save EN keys for reference
file_put_contents('network-en-keys.txt', implode("\n", $enKeys));
echo "\nEN keys saved to: network-en-keys.txt\n";
