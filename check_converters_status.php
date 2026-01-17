<?php
$file = 'translation_audit.csv';
$lines = file($file);
$headers = str_getcsv(array_shift($lines));
foreach ($lines as $line) {
    if (trim($line) === '')
        continue;
    $row = array_combine($headers, str_getcsv($line));
    if ($row['Category'] === 'converters') {
        printf("%-30s | %s | %s/%s | %s\n", $row['Tool'], $row['Locale'], $row['Translated'], $row['Total Keys'], $row['Percentage']);
    }
}
