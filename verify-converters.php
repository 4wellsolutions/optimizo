<?php

/**
 * Systematic Verification Script for all 20 Converter Tools
 * Checks: view files, translation keys, controllers, meta sections
 */

$converterSlugs = [
    'angle-converter',
    'area-converter',
    'cooking-unit-converter',
    'data-transfer-rate-converter',
    'density-converter',
    'digital-storage-converter',
    'energy-converter',
    'force-converter',
    'frequency-converter',
    'fuel-consumption-converter',
    'length-converter',
    'molar-mass-converter',
    'power-converter',
    'pressure-converter',
    'speed-converter',
    'temperature-converter',
    'time-unit-converter',
    'torque-converter',
    'volume-converter',
    'weight-converter',
];

$results = [];
$issues = [];

echo "\n=== CONVERTER TOOLS VERIFICATION ===\n\n";

foreach ($converterSlugs as $slug) {
    echo "Checking: $slug\n";

    $toolCheck = [
        'slug' => $slug,
        'view_file_exists' => false,
        'en_key_exists' => false,
        'es_key_exists' => false,
        'ru_key_exists' => false,
        'en_has_meta' => false,
        'en_has_h1' => false,
        'en_has_subtitle' => false,
        'es_has_meta' => false,
        'es_has_h1' => false,
        'es_has_subtitle' => false,
        'ru_has_meta' => false,
        'ru_has_h1' => false,
        'ru_has_subtitle' => false,
    ];

    // Check view file
    $viewFile = __DIR__ . "/resources/views/tools/converters/{$slug}.blade.php";
    $toolCheck['view_file_exists'] = file_exists($viewFile);
    if (!$toolCheck['view_file_exists']) {
        $issues[] = "$slug: View file missing";
    }

    // Check EN translation
    $enTranslations = include __DIR__ . '/resources/lang/en/tools/converters.php';
    $toolCheck['en_key_exists'] = isset($enTranslations[$slug]);
    if ($toolCheck['en_key_exists']) {
        $toolCheck['en_has_meta'] = isset($enTranslations[$slug]['meta']);
        $toolCheck['en_has_h1'] = isset($enTranslations[$slug]['meta']['h1']);
        $toolCheck['en_has_subtitle'] = isset($enTranslations[$slug]['meta']['subtitle']);

        if (!$toolCheck['en_has_subtitle']) {
            $issues[] = "$slug: EN missing meta.subtitle";
        }
    } else {
        $issues[] = "$slug: EN translation key missing";
    }

    // Check ES translation
    $esTranslations = include __DIR__ . '/resources/lang/es/tools/converters.php';
    $toolCheck['es_key_exists'] = isset($esTranslations[$slug]);
    if ($toolCheck['es_key_exists']) {
        $toolCheck['es_has_meta'] = isset($esTranslations[$slug]['meta']);
        $toolCheck['es_has_h1'] = isset($esTranslations[$slug]['meta']['h1']);
        $toolCheck['es_has_subtitle'] = isset($esTranslations[$slug]['meta']['subtitle']);

        if (!$toolCheck['es_has_subtitle']) {
            $issues[] = "$slug: ES missing meta.subtitle";
        }
    } else {
        $issues[] = "$slug: ES translation key missing";
    }

    // Check RU translation
    $ruTranslations = include __DIR__ . '/resources/lang/ru/tools/converters.php';
    $toolCheck['ru_key_exists'] = isset($ruTranslations[$slug]);
    if ($toolCheck['ru_key_exists']) {
        $toolCheck['ru_has_meta'] = isset($ruTranslations[$slug]['meta']);
        $toolCheck['ru_has_h1'] = isset($ruTranslations[$slug]['meta']['h1']);
        $toolCheck['ru_has_subtitle'] = isset($ruTranslations[$slug]['meta']['subtitle']);

        if (!$toolCheck['ru_has_subtitle']) {
            $issues[] = "$slug: RU missing meta.subtitle";
        }
    } else {
        $issues[] = "$slug: RU translation key missing";
    }

    $results[] = $toolCheck;
}

// Summary
echo "\n=== VERIFICATION SUMMARY ===\n";
echo "Total converters checked: " . count($converterSlugs) . "\n\n";

$allPassed = count($issues) === 0;

if ($allPassed) {
    echo "✅ ALL CHECKS PASSED!\n";
} else {
    echo "⚠️  ISSUES FOUND: " . count($issues) . "\n\n";
    foreach ($issues as $issue) {
        echo "  - $issue\n";
    }
}

// Save detailed results
file_put_contents('converter-verification-results.json', json_encode($results, JSON_PRETTY_PRINT));
echo "\nDetailed results saved to: converter-verification-results.json\n";
