<?php

$locales = ['ru', 'es'];
$category = 'seo';

foreach ($locales as $locale) {
    $filePath = "resources/lang/$locale/tools/$category.json";
    if (!file_exists($filePath)) {
        echo "File not found: $filePath\n";
        continue;
    }

    $data = json_decode(file_get_contents($filePath), true);
    $total = 0;
    $pending = 0;

    array_walk_recursive($data, function ($value) use (&$total, &$pending) {
        $total++;
        if (is_string($value) && strpos($value, '[Pending Translation]') !== false) {
            $pending++;
        }
    });

    $percent = $total > 0 ? round((($total - $pending) / $total) * 100, 2) : 0;
    echo "$locale: $percent% complete ($pending pending out of $total total keys)\n";

    foreach ($data as $slug => $content) {
        $toolPending = 0;
        array_walk_recursive($content, function ($value) use (&$toolPending) {
            if (is_string($value) && strpos($value, '[Pending Translation]') !== false) {
                $toolPending++;
            }
        });
        if ($toolPending > 0) {
            echo "  - $slug: $toolPending pending keys\n";
        }
    }
}
