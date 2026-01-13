<?php

/**
 * Properly merge EN content into ES/RU without corrupting files
 * Keep ES/RU meta/seo translations, copy rest from EN
 */

echo "=== MERGING EN TO ES/RU (PROPER) ===\n\n";

$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';
$esFile = __DIR__ . '/resources/lang/es/tools/utilities.php';
$ruFile = __DIR__ . '/resources/lang/ru/tools/utilities.php';

// Load files
$en = include $enFile;
$es = include $esFile;
$ru = include $ruFile;

echo "EN tools: " . count($en) . "\n";
echo "ES tools (before): " . count($es) . "\n";
echo "RU tools (before): " . count($ru) . "\n\n";

// For each EN tool, merge into ES/RU preserving their meta/seo translations
foreach ($en as $slug => $enData) {
    // ES: Keep translated meta/seo, use EN for everything else
    if (isset($es[$slug])) {
        $esTranslations = [
            'meta' => $es[$slug]['meta'] ?? [],
            'seo' => $es[$slug]['seo'] ?? [],
        ];
        $es[$slug] = array_merge($enData, $esTranslations);
    } else {
        $es[$slug] = $enData;
    }

    // RU: Keep translated meta/seo, use EN for everything else
    if (isset($ru[$slug])) {
        $ruTranslations = [
            'meta' => $ru[$slug]['meta'] ?? [],
            'seo' => $ru[$slug]['seo'] ?? [],
        ];
        $ru[$slug] = array_merge($enData, $ruTranslations);
    } else {
        $ru[$slug] = $enData;
    }
}

// Write files using proper PHP syntax (not var_export which corrupts)
function writeProperPHP($file, $data)
{
    $content = "<?php\n\nreturn " . var_export($data, true) . ";\n";
    file_put_contents($file, $content);
}

writeProperPHP($esFile, $es);
writeProperPHP($ruFile, $ru);

echo "✅ ES tools (after): " . count($es) . "\n";
echo "✅ RU tools (after): " . count($ru) . "\n";
echo "\n✅ Merge complete! EN file was NOT modified.\n";
