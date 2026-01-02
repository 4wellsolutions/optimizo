<?php

$csvFile = __DIR__ . '/storage/geo/third_party/devsite/developers/en/google-ads/api/data/geo/geotargets-2025-10-29.csv';
$outputFile = __DIR__ . '/resources/data/locations_full.jsonl';

if (!file_exists($csvFile)) {
    die("CSV file not found at: $csvFile\n");
}

echo "Processing CSV...\n";

$handle = fopen($csvFile, 'r');
$outHandle = fopen($outputFile, 'w');

if ($handle === false || $outHandle === false) {
    die("Error opening file handles.\n");
}

// Skip header
fgetcsv($handle);

$count = 0;
while (($data = fgetcsv($handle)) !== false) {
    // Index 2 is Canonical Name, Index 6 is Status
    // Only include Active targets
    if (isset($data[6]) && $data[6] === 'Active') {
        $canonicalName = $data[2] ?? null;
        if ($canonicalName) {
            // Write distinct JSON line
            $jsonLine = json_encode(['name' => $canonicalName]) . "\n";
            fwrite($outHandle, $jsonLine);
            $count++;

            if ($count % 10000 == 0) {
                echo "Processed $count locations...\n";
            }
        }
    }
}

fclose($handle);
fclose($outHandle);

echo "Done! Processed $count locations. Saved to $outputFile\n";
