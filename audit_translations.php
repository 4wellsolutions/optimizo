<?php
$categories = [
    'development',
    'converters',
    'spreadsheet',
    'youtube',
    'seo',
    'utility',
    'time',
    'text',
    'image',
    'document',
    'network'
];
$locales = ['ru', 'es'];
$report = [];

foreach ($locales as $locale) {
    foreach ($categories as $cat) {
        $jsonPath = "resources/lang/$locale/tools/$cat.json";
        if (!file_exists($jsonPath)) {
            $report[$locale][$cat]['status'] = 'MISSING_FILE';
            continue;
        }

        $data = json_decode(file_get_contents($jsonPath), true) ?: [];
        foreach ($data as $slug => $content) {
            $stats = countKeys($content);
            $report[$locale][$cat][$slug] = $stats;
        }
    }
}

function countKeys($array)
{
    $total = 0;
    $pending = 0;

    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($array));
    foreach ($it as $val) {
        $total++;
        if (is_string($val) && strpos($val, '[Pending Translation') !== false) {
            $pending++;
        }
    }

    return [
        'total' => $total,
        'pending' => $pending,
        'translated' => $total - $pending,
        'percent' => $total > 0 ? round((($total - $pending) / $total) * 100, 2) : 0
    ];
}

// Write to a CSV or readable format
$output = "Locale,Category,Tool,Total Keys,Pending,Translated,Percentage\n";
foreach ($report as $locale => $cats) {
    foreach ($cats as $catName => $tools) {
        if (isset($tools['status']))
            continue;
        foreach ($tools as $slug => $stats) {
            $output .= "$locale,$catName,$slug,{$stats['total']},{$stats['pending']},{$stats['translated']},{$stats['percent']}%\n";
        }
    }
}

file_put_contents('translation_audit.csv', $output);
echo "Audit completed. Report saved to translation_audit.csv\n";
