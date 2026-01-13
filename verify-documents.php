<?php

/**
 * Verify all 11 Document tools have complete meta.subtitle
 */

$documentSlugs = [
    'pdf-to-word',
    'word-to-pdf',
    'excel-to-pdf',
    'pdf-to-excel',
    'powerpoint-to-pdf',
    'pdf-to-powerpoint',
    'jpg-to-pdf',
    'pdf-to-jpg',
    'pdf-compressor',
    'pdf-merger',
    'pdf-splitter',
];


$results = [];
$issues = [];

echo "\n=== DOCUMENT TOOLS VERIFICATION ===\n\n";

foreach ($documentSlugs as $slug) {
    echo "Checking: $slug\n";

    $toolCheck = [
        'slug' => $slug,
        'en_has_subtitle' => false,
        'es_has_subtitle' => false,
        'ru_has_subtitle' => false,
    ];

    // Check EN
    $enTranslations = include __DIR__ . '/resources/lang/en/tools/document.php';
    if (isset($enTranslations[$slug]['meta']['subtitle'])) {
        $toolCheck['en_has_subtitle'] = true;
    } else {
        $issues[] = "$slug: EN missing meta.subtitle";
    }

    // Check ES
    $esTranslations = include __DIR__ . '/resources/lang/es/tools/document.php';
    if (isset($esTranslations[$slug]['meta']['subtitle'])) {
        $toolCheck['es_has_subtitle'] = true;
    } else {
        $issues[] = "$slug: ES missing meta.subtitle";
    }

    // Check RU
    $ruTranslations = include __DIR__ . '/resources/lang/ru/tools/document.php';
    if (isset($ruTranslations[$slug]['meta']['subtitle'])) {
        $toolCheck['ru_has_subtitle'] = true;
    } else {
        $issues[] = "$slug: RU missing meta.subtitle";
    }

    $results[] = $toolCheck;
}

echo "\n=== VERIFICATION SUMMARY ===\n";
echo "Total document tools checked: " . count($documentSlugs) . "\n\n";

$allPassed = count($issues) === 0;

if ($allPassed) {
    echo "✅ ALL CHECKS PASSED! All 11 document tools complete.\n";
} else {
    echo "⚠️  ISSUES FOUND: " . count($issues) . "\n\n";
    foreach ($issues as $issue) {
        echo "  - $issue\n";
    }
}

file_put_contents('document-verification-results.json', json_encode($results, JSON_PRETTY_PRINT));
