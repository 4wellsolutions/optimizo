<?php

$toolsDir = 'resources/lang/en/tools';
$files = glob($toolsDir . '/*.php');

$report = [];

foreach ($files as $file) {
    $data = include $file;
    $basename = basename($file, '.php');

    $report[$basename] = [
        'count' => count($data),
        'tools' => array_keys($data)
    ];
}

// Sort by file name
ksort($report);

// Output the report
foreach ($report as $filename => $info) {
    echo str_repeat('=', 80) . "\n";
    echo strtoupper($filename) . " ({$info['count']} tools)\n";
    echo str_repeat('=', 80) . "\n";

    foreach ($info['tools'] as $tool) {
        echo "  - $tool\n";
    }

    echo "\n";
}

// Summary
echo str_repeat('=', 80) . "\n";
echo "SUMMARY\n";
echo str_repeat('=', 80) . "\n";
foreach ($report as $filename => $info) {
    echo sprintf("%-20s: %3d tools\n", $filename, $info['count']);
}

$totalTools = array_sum(array_column($report, 'count'));
echo str_repeat('-', 80) . "\n";
echo sprintf("%-20s: %3d tools\n", "TOTAL", $totalTools);
