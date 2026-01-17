<?php
$locales = ['ru', 'es'];
$path = 'resources/lang';
$results = [];

foreach ($locales as $locale) {
    $dir = "$path/$locale/tools";
    if (!is_dir($dir))
        continue;

    $files = glob("$dir/*.json");
    foreach ($files as $file) {
        $content = file_get_contents($file);
        $pending = substr_count($content, '[Pending Translation');
        $results[] = [
            'file' => basename($file),
            'locale' => $locale,
            'pending' => $pending
        ];
    }
}

// Sort by pending count descending
usort($results, function ($a, $b) {
    return $b['pending'] <=> $a['pending'];
});

echo str_pad("FILE", 25) . " | " . str_pad("LOCALE", 8) . " | " . "PENDING\n";
echo str_repeat("-", 45) . "\n";
foreach ($results as $r) {
    echo str_pad($r['file'], 25) . " | " . str_pad($r['locale'], 8) . " | " . $r['pending'] . "\n";
}
