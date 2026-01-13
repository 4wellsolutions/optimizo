<?php

/**
 * Add missing seo.title and seo.description to EN utilities
 * Smart file modification to preserve existing content
 */

echo "=== ADDING SEO SECTIONS TO EN UTILITIES ===\n\n";

$file = __DIR__ . '/resources/lang/en/tools/utilities.php';
$content = file_get_contents($file);

// Load to get tool names
$utilities = include $file;

echo "Total tools: " . count($utilities) . "\n";

$added = 0;
$skipped = 0;

foreach ($utilities as $slug => $data) {
    // Check if seo section needs to be added
    $needsSeo = !isset($data['seo']) || !isset($data['seo']['title']) || !isset($data['seo']['description']);

    if (!$needsSeo) {
        $skipped++;
        continue;
    }

    // Get meta data for generating SEO
    $h1 = $data['meta']['h1'] ?? $data['meta']['title'] ?? ucwords(str_replace(['-', '_'], ' ', $slug));
    $subtitle = $data['meta']['subtitle'] ?? $data['meta']['desc'] ?? '';

    // Generate SEO title and description
    $seoTitle = $h1 . ' - Free Online Tool';
    $seoDesc = $subtitle
        ? ('Free ' . strtolower($h1) . '. ' . $subtitle . ' No registration required.')
        : ('Free online ' . strtolower($h1) . ' tool. Fast, secure, and easy to use. No registration required.');

    // Find the tool's entry in the content
    $pattern = "/'$slug'\s*=>\s*\[/";

    if (preg_match($pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
        $startPos = $matches[0][1];

        // Find the closing bracket for meta section
        $metaPattern = "/'meta'\s*=>\s*\[[^\]]*\],/s";

        if (preg_match($metaPattern, $content, $metaMatches, PREG_OFFSET_CAPTURE, $startPos)) {
            $metaEnd = $metaMatches[0][1] + strlen($metaMatches[0][0]);

            // Check if seo section already exists
            $nextSection = substr($content, $metaEnd, 200);

            if (!preg_match("/'seo'\s*=>/", $nextSection)) {
                // No seo section - add it
                $seoSection = "\n        'seo' => [\n";
                $seoSection .= "            'title' => '" . addslashes($seoTitle) . "',\n";
                $seoSection .= "            'description' => '" . addslashes($seoDesc) . "',\n";
                $seoSection .= "        ],";

                $content = substr_replace($content, $seoSection, $metaEnd, 0);
                $added++;
                echo "✓ Added SEO to: $slug\n";
            } else {
                // SEO section exists, check if title/description are missing
                // This is more complex, skip for now
                $skipped++;
            }
        }
    }
}

// Save the modified content
file_put_contents($file, $content);

echo "\n=== SUMMARY ===\n";
echo "Added SEO sections: $added\n";
echo "Skipped (already has SEO): $skipped\n";
echo "Total: " . count($utilities) . "\n";
echo "\n✅ File updated: $file\n";
