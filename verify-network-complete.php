<?php

// Quick verification
$langs = ['en', 'es', 'ru'];
echo "=== NETWORK VERIFICATION ===\n\n";

foreach ($langs as $lang) {
    $file = __DIR__ . "/resources/lang/{$lang}/tools/network.php";
    $trans = include $file;

    $withSubtitle = 0;
    foreach ($trans as $tool) {
        if (isset($tool['meta']['subtitle'])) {
            $withSubtitle++;
        }
    }

    $total = count($trans);
    echo "{$lang}: {$withSubtitle}/{$total}\n";
}
