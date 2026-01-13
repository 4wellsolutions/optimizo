<?php

/**
 * SEO Tools Key Verification
 * Check if keys match and identify any missing meta sections
 */

echo "=== SEO TOOLS KEY VERIFICATION ===\n\n";

$enFile = __DIR__ . '/resources/lang/en/tools/seo.php';
$esFile = __DIR__ . '/resources/lang/es/tools/seo.php';
$ruFile = __DIR__ . '/resources/lang/ru/tools/seo.php';

$enKeys = array_keys(include $enFile);
$esKeys = array_keys(include $esFile);
$ruKeys = array_keys(include $ruFile);

echo "EN keys: " . count($enKeys) . "\n";
echo "ES keys: " . count($esKeys) . "\n";
echo "RU keys: " . count($ruKeys) . "\n\n";

// Show EN keys
echo "EN Keys (Source of Truth):\n";
foreach ($enKeys as $i => $key) {
    echo "  " . ($i + 1) . ". $key\n";
}
echo "\n";

// Check for meta sections in EN
echo "EN Meta Section Status:\n";
$enTrans = include $enFile;
foreach ($enKeys as $key) {
    $hasMeta = isset($enTrans[$key]['meta']);
    $hasH1 = isset($enTrans[$key]['meta']['h1']);
    $status = $hasMeta ? ($hasH1 ? '✓' : '⚠ no h1') : '✗ NO META';
    echo "  $key: $status\n";
}

// Verify key consistency
if ($enKeys === $esKeys && $enKeys === $ruKeys) {
    echo "\n✅ ALL KEYS MATCH!\n";
} else {
    echo "\n⚠️  KEY MISMATCHES FOUND\n";

    $missingInES = array_diff($enKeys, $esKeys);
    $missingInRU = array_diff($enKeys, $ruKeys);

    if ($missingInES) {
        echo "Missing in ES: " . implode(', ', $missingInES) . "\n";
    }
    if ($missingInRU) {
        echo "Missing in RU: " . implode(', ', $missingInRU) . "\n";
    }
}

file_put_contents('seo-en-keys.txt', implode("\n", $enKeys));
