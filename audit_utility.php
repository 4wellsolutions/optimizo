<?php
$locales = ['ru', 'es'];
$category = 'utility';

foreach ($locales as $locale) {
    echo "--- Locale: $locale, Category: $category ---\n";
    $path = "resources/lang/$locale/tools/$category.json";
    if (!file_exists($path)) {
        echo "File not found: $path\n";
        continue;
    }

    $data = json_decode(file_get_contents($path), true);
    if ($data === null) {
        echo "JSON decode error: $path\n";
        continue;
    }

    $pendingCount = 0;
    $totalCount = 0;

    array_walk_recursive($data, function ($value, $key) use (&$pendingCount, &$totalCount) {
        $totalCount++;
        if (is_string($value) && strpos($value, '[Pending Translation]') !== false) {
            $pendingCount++;
        }
    });

    echo "Total Keys: $totalCount\n";
    echo "Pending Keys: $pendingCount\n";
    echo "Status: " . ($totalCount > 0 ? round((($totalCount - $pendingCount) / $totalCount) * 100, 2) : 0) . "%\n\n";
}
