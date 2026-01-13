<?php

/**
 * Final EN SEO Cleanup:
 * 1. Remove keyword-density (duplicate)
 * 2. Add meta.h1 and meta.subtitle to ALL tools where missing
 */

$file = __DIR__ . '/resources/lang/en/tools/seo.php';
$translations = include $file;

echo "=== FINAL EN SEO CLEANUP ===\n\n";

// Remove keyword-density
if (isset($translations['keyword-density'])) {
    unset($translations['keyword-density']);
    echo "✓ Removed keyword-density (duplicate)\n";
}

// Define meta for all 10 tools
$metaData = [
    'meta-analyzer' => [
        'h1' => 'Meta Tag Analyzer',
        'subtitle' => 'Analyze meta tags, title, description & keywords for SEO optimization',
    ],
    'meta-tag-analyzer' => [
        'h1' => 'Meta Tag Analyzer',
        'subtitle' => 'Comprehensive analysis of meta tags for search engine optimization',
    ],
    'bing-serp-checker' => [
        'h1' => 'Bing SERP Checker',
        'subtitle' => 'Check Bing search rankings for your keywords across different locations',
    ],
    'keyword-density-checker' => [
        'h1' => 'Keyword Density Checker',
        'subtitle' => 'Check keyword usage and density for better search rankings',
    ],
    'word-counter' => [
        'h1' => 'Word Counter',
        'subtitle' => 'Count words, characters, sentences & paragraphs in your text instantly',
    ],
    'google-serp-checker' => [
        'h1' => 'Google SERP Checker',
        'subtitle' => 'Check Google search rankings and track keyword positions globally',
    ],
    'yahoo-serp-checker' => [
        'h1' => 'Yahoo SERP Checker',
        'subtitle' => 'Monitor Yahoo search rankings for your keywords and competitors',
    ],
    'broken-links-checker' => [
        'h1' => 'Broken Links Checker',
        'subtitle' => 'Find and fix broken links on your website for better SEO & UX',
    ],
    'on-page-seo-checker' => [
        'h1' => 'On-Page SEO Checker',
        'subtitle' => 'Complete on-page SEO audit with actionable recommendations',
    ],
    'pdf-report' => [
        'h1' => 'PDF Report Generator',
        'subtitle' => 'Generate detailed PDF reports for SEO analysis and audits',
    ],
];

// Add/update meta for each tool
$updated = 0;
foreach ($metaData as $slug => $meta) {
    if (isset($translations[$slug])) {
        if (!isset($translations[$slug]['meta'])) {
            $translations[$slug]['meta'] = [];
            echo "+ Created meta section for: $slug\n";
        }
        $translations[$slug]['meta']['h1'] = $meta['h1'];
        $translations[$slug]['meta']['subtitle'] = $meta['subtitle'];
        $updated++;
    }
}

echo "\n✓ Updated meta (h1 + subtitle) for {$updated}/10 tools\n";
echo "Total SEO tools: " . count($translations) . "\n";

// Save with proper formatting
$output = "<?php\n\nreturn [\n";

foreach ($translations as $slug => $data) {
    $output .= "    // " . ucwords(str_replace('-', ' ', $slug)) . "\n";
    $output .= "    '{$slug}' => [\n";

    // Order: meta, seo, form, interface, results, content, etc.
    $sections = ['meta', 'seo', 'form', 'interface', 'results', 'stats', 'alerts', 'content', 'meta_tags', 'benefits', 'results_labels', 'features', 'faq', 'js', 'markets', 'domains', 'progress', 'link_types', 'best_practices', 'guidelines', 'best_practices', 'labels', 'how_to'];

    foreach ($sections as $section) {
        if (isset($data[$section]) && is_array($data[$section])) {
            $output .= "        '{$section}' => [\n";
            foreach ($data[$section] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }
    }

    $output .= "    ],\n\n";
}

$output .= "];\n";
file_put_contents($file, $output);

echo "\n✅ COMPLETE! EN SEO file now has:\n";
echo "   - 10 tools (keyword-density removed)\n";
echo "   - All tools have meta.h1 and meta.subtitle\n";
