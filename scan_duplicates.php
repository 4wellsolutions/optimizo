<?php
// We need to read the file RAW because inclusion overwrites keys
$lines = file(__DIR__ . '/resources/lang/en/tools/utilities.php');
$content = implode("", $lines);

// Regex to find top-level keys
// Matches 'key' => [
preg_match_all("/^\s*'([\w-]+)'\s*=>\s*\[/m", $content, $matches, PREG_OFFSET_CAPTURE);

$keys = $matches[1];
$counts = array_count_values($keys);
$duplicates = [];
foreach ($counts as $key => $count) {
    if ($count > 1)
        $duplicates[] = $key;
}

echo "Found duplicates: " . implode(', ', $duplicates) . "\n";

// Manual helper isn't feasible for deep complexity without parsing.
// Instead, let's just use the `include` trick but capture the 'first' one? No that's hard.
// Actually, I can use the fact that I know where the split is (line 5270).

$fullArray = include __DIR__ . '/resources/lang/en/tools/utilities.php';

// The fullArray contains the LAST definition (the "better" one or the "meta-only" one).
// I need to check if the LAST definition is "Meta Only" (broken) or "Full".

foreach ($duplicates as $tool) {
    $data = $fullArray[$tool];
    $isMetaOnly = !isset($data['editor']);

    echo "Tool: $tool - ";
    if ($isMetaOnly) {
        echo "Last definition is META-ONLY (BROKEN). Needs merge.\n";
    } else {
        echo "Last definition is FULL. Safe to keep? (Check vs first)\n";
    }
}
