<?php

$locales = ['ru', 'es'];
$categories = ['converters', 'document', 'image', 'network', 'seo', 'spreadsheet', 'text', 'time', 'utility', 'youtube'];

foreach ($categories as $category) {
    echo "Category: $category\n";
    foreach ($locales as $locale) {
        $filePath = "resources/lang/$locale/tools/$category.json";
        if (!file_exists($filePath)) {
            echo "  $locale: File not found: $filePath\n";
            continue;
        }

        $content = file_get_contents($filePath);
        $data = json_decode($content, true);
        if ($data === null) {
            echo "  $locale: Failed to decode JSON in $filePath. Error: " . json_last_error_msg() . "\n";
            continue;
        }
        $total = 0;
        $pending = 0;

        array_walk_recursive($data, function ($value) use (&$total, &$pending) {
            $total++;
            if (is_string($value) && strpos($value, '[Pending Translation]') !== false) {
                $pending++;
            }
        });

        $percent = $total > 0 ? round((($total - $pending) / $total) * 100, 2) : 0;
        echo "  $locale: $percent% complete ($pending pending out of $total total keys)\n";

        if ($pending > 0) {
            foreach ($data as $slug => $content) {
                $toolPending = 0;
                array_walk_recursive($content, function ($value) use (&$toolPending) {
                    if (is_string($value) && strpos($value, '[Pending Translation]') !== false) {
                        $toolPending++;
                    }
                });
                if ($toolPending > 0) {
                    echo "    - $slug: $toolPending pending keys\n";
                }
            }
        }
    }
}
