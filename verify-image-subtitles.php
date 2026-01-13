<?php

/**
 * Quick verification of what actually got added
 */

echo "=== IMAGE TOOLS VERIFICATION ===\n\n";

$langs = ['en' => 'English', 'es' => 'Spanish', 'ru' => 'Russian'];
$results = [];

foreach ($langs as $code => $name) {
    $file = __DIR__ . "/resources/lang/{$code}/tools/images.php";
    $trans = include $file;

    $withSubtitle = 0;
    foreach ($trans as $tool) {
        if (isset($tool['meta']['subtitle'])) {
            $withSubtitle++;
        }
    }

    $total = count($trans);
    $results[$code] = ['total' => $total, 'with_subtitle' => $withSubtitle];

    echo "{$name} ({$code}): {$withSubtitle}/{$total} tools have subtitle\n";
}

echo "\n";
if ($results['en']['with_subtitle'] == 12 && $results['es']['with_subtitle'] == 12 && $results['ru']['with_subtitle'] == 12) {
    echo "✅ ALL COMPLETE!\n";
} else {
    echo "⚠️  Incomplete - needs manual review for key mismatches\n";
}
