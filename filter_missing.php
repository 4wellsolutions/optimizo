<?php
$audit = array_map('str_getcsv', file('translation_audit.csv'));
$header = array_shift($audit);
$data = [];
foreach ($audit as $row) {
    if (count($row) < 7)
        continue;
    $data[] = array_combine($header, $row);
}

foreach (['ru', 'es'] as $locale) {
    $missing = array_filter($data, function ($item) use ($locale) {
        return $item['Locale'] === $locale && $item['Percentage'] === '0%';
    });

    $out = "Category,Tool\n";
    foreach ($missing as $m) {
        $out .= "{$m['Category']},{$m['Tool']}\n";
    }
    file_put_contents("{$locale}_missing.csv", $out);
    echo "$locale missing: " . count($missing) . " tools\n";
}
