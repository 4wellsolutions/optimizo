<?php

/**
 * Compare EN and RU image keys and show exact differences
 */

$enFile = __DIR__ . '/resources/lang/en/tools/images.php';
$ruFile = __DIR__ . '/resources/lang/ru/tools/images.php';

$enKeys = array_keys(include $enFile);
$ruKeys = array_keys(include $ruFile);

echo "=== EN KEYS (Source of Truth) ===\n";
foreach ($enKeys as $i => $key) {
    echo ($i + 1) . ". $key\n";
}

echo "\n=== RU KEYS (Current) ===\n";
foreach ($ruKeys as $i => $key) {
    echo ($i + 1) . ". $key\n";
}

echo "\n=== COMPARISON ===\n";

// Check if they match
if ($enKeys === $ruKeys) {
    echo "✅ PERFECT MATCH!\n";
} else {
    echo "❌ MISMATCH FOUND\n\n";

    // Show side-by-side comparison
    echo "Position | EN Key | RU Key | Match?\n";
    echo "---------|--------|--------|-------\n";

    $maxCount = max(count($enKeys), count($ruKeys));
    for ($i = 0; $i < $maxCount; $i++) {
        $enKey = isset($enKeys[$i]) ? $enKeys[$i] : '[MISSING]';
        $ruKey = isset($ruKeys[$i]) ? $ruKeys[$i] : '[MISSING]';
        $match = ($enKey === $ruKey) ? '✓' : '✗';

        printf("%8d | %-30s | %-30s | %s\n", $i + 1, $enKey, $ruKey, $match);
    }
}
