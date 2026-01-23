<?php
// Debug exact file content keys
$files = ['document.json', 'text.json', 'image.json', 'time.json'];
$base = 'resources/lang';

foreach ($files as $f) {
    echo "=== $f ===\n";
    $enPath = "$base/en/tools/$f";
    $dePath = "$base/de/tools/$f";

    $en = json_decode(file_get_contents($enPath), true);
    $de = json_decode(file_get_contents($dePath), true);

    $enKeys = array_keys($en);
    echo "EN Top Keys: " . implode(', ', $enKeys) . "\n";

    $deKeys = array_keys($de);
    echo "DE Top Keys: " . implode(', ', $deKeys) . "\n";

    // Check specific missing ones
    if ($f === 'document.json') {
        echo "Check 'morse-to-text' in EN document.json: " . (isset($en['morse-to-text-converter']) ? 'YES' : 'NO') . "\n";
    }
}
