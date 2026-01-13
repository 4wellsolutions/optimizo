<?php

/**
 * Merge full EN utilities into ES/RU, keeping our translations but adding missing sections
 */

echo "=== MERGING EN CONTENT INTO ES/RU UTILITIES ===\n\n";

$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';
$esFile = __DIR__ . '/resources/lang/es/tools/utilities.php';
$ruFile = __DIR__ . '/resources/lang/ru/tools/utilities.php';

$en = include $enFile;
$es = include $esFile;
$ru = include $ruFile;

echo "EN tools: " . count($en) . "\n";
echo "ES tools: " . count($es) . "\n";
echo "RU tools: " . count($ru) . "\n\n";

// Merge: Keep ES/RU meta & seo translations, but add all other sections from EN
foreach ($en as $slug => $enData) {
    // For ES
    if (isset($es[$slug])) {
        $es[$slug] = array_merge($enData, $es[$slug]); // EN first, then ES overwrites meta/seo
    } else {
        $es[$slug] = $enData; // Use full EN if not in ES
    }

    // For RU
    if (isset($ru[$slug])) {
        $ru[$slug] = array_merge($enData, $ru[$slug]); // EN first, then RU overwrites meta/seo
    } else {
        $ru[$slug] = $enData; // Use full EN if not in RU
    }
}

// Save merged files
file_put_contents($esFile, "<?php\n\nreturn " . var_export($es, true) . ";\n");
file_put_contents($ruFile, "<?php\n\nreturn " . var_export($ru, true) . ";\n");

echo "✅ Merged EN content into ES (" . count($es) . " tools)\n";
echo "✅ Merged EN content into RU (" . count($ru) . " tools)\n";
echo "\nFiles updated:\n";
echo "- $esFile\n";
echo "- $ruFile\n";
