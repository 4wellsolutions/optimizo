<?php

// Fill empty keys in youtube.json with SEO-optimized content

$file = 'resources/lang/en/tools/youtube.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define the content to fill
$fills = [
    'youtube-monetization-checker.content.revenue6_title' => 'YouTube Premium Revenue',
    'youtube-monetization-checker.content.revenue6_desc' => 'Earn a share of subscription fees when YouTube Premium members watch your content. This provides stable income independent of ads.',
    'youtube-monetization-checker.content.notice_title' => 'Important Notice',
    'youtube-monetization-checker.content.notice_text' => 'Monetization eligibility requires 1,000 subscribers and 4,000 watch hours in the past 12 months. Actual earnings vary based on CPM, audience location, content category, and advertiser demand. This tool provides estimates only.',
    'youtube-tag-generator.form.generate_button' => 'Generate Tags',
    'youtube-tag-generator.results.copy_all' => 'Copy All Tags',
    'youtube-tag-generator.js.error_enter_keyword' => 'Please enter a keyword to generate tags',
    'youtube-tag-generator.js.error_failed' => 'Failed to generate tags. Please try again.',
    'youtube-tag-generator.js.generating' => 'Generating tags...',
    'youtube-tag-generator.js.generate_button' => 'Generate Tags',
    'youtube-tag-generator.js.copied' => 'Tag copied to clipboard!',
    'youtube-tag-generator.js.copy_all' => 'All tags copied to clipboard!'
];

// Function to set nested array value
function setNestedValue(&$array, $path, $value)
{
    $keys = explode('.', $path);
    $current = &$array;

    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            $current[$key] = [];
        }
        $current = &$current[$key];
    }

    $current = $value;
}

// Fill the empty keys
foreach ($fills as $path => $value) {
    setNestedValue($data, $path, $value);
}

// Save the file
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents($file, $json);

echo "✅ youtube.json: Filled 12 empty keys\n";
echo "  - youtube-monetization-checker revenue6 and notice sections\n";
echo "  - youtube-tag-generator form, results, and JS messages\n";
