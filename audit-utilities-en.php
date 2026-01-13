<?php

/**
 * Audit English Utilities - Verify all tools have complete meta and seo sections
 * Required: meta.h1, meta.subtitle, seo.title, seo.description
 */

echo "=== ENGLISH UTILITIES AUDIT ===\n\n";

$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';

if (!file_exists($enFile)) {
    die("ERROR: English utilities file not found!\n");
}

$utilities = include $enFile;

echo "Total tools found: " . count($utilities) . "\n\n";

$incomplete = [];
$complete = [];
$missing_meta_h1 = [];
$missing_meta_subtitle = [];
$missing_seo_title = [];
$missing_seo_description = [];

foreach ($utilities as $slug => $data) {
    $issues = [];

    // Check meta.h1
    if (!isset($data['meta']['h1']) || empty($data['meta']['h1'])) {
        $issues[] = 'meta.h1';
        $missing_meta_h1[] = $slug;
    }

    // Check meta.subtitle
    if (!isset($data['meta']['subtitle']) || empty($data['meta']['subtitle'])) {
        $issues[] = 'meta.subtitle';
        $missing_meta_subtitle[] = $slug;
    }

    // Check seo.title
    if (!isset($data['seo']['title']) || empty($data['seo']['title'])) {
        $issues[] = 'seo.title';
        $missing_seo_title[] = $slug;
    }

    // Check seo.description
    if (!isset($data['seo']['description']) || empty($data['seo']['description'])) {
        $issues[] = 'seo.description';
        $missing_seo_description[] = $slug;
    }

    if (count($issues) > 0) {
        $incomplete[$slug] = $issues;
    } else {
        $complete[] = $slug;
    }
}

echo "COMPLETE TOOLS: " . count($complete) . "\n";
echo "INCOMPLETE TOOLS: " . count($incomplete) . "\n\n";

if (count($incomplete) > 0) {
    echo "❌ INCOMPLETE TOOLS:\n";
    echo str_repeat("=", 80) . "\n";

    foreach ($incomplete as $slug => $issues) {
        echo sprintf("%-40s Missing: %s\n", $slug, implode(', ', $issues));
    }

    echo "\n" . str_repeat("=", 80) . "\n";
    echo "SUMMARY OF MISSING FIELDS:\n";
    echo "- Missing meta.h1: " . count($missing_meta_h1) . "\n";
    echo "- Missing meta.subtitle: " . count($missing_meta_subtitle) . "\n";
    echo "- Missing seo.title: " . count($missing_seo_title) . "\n";
    echo "- Missing seo.description: " . count($missing_seo_description) . "\n";

    // Save list to file for fixing
    file_put_contents(__DIR__ . '/utilities-incomplete.txt', implode("\n", array_keys($incomplete)));
    echo "\nIncomplete tools list saved to: utilities-incomplete.txt\n";
} else {
    echo "✅ ALL TOOLS COMPLETE! All 79 utilities have meta.h1, meta.subtitle, seo.title, and seo.description\n";
}
