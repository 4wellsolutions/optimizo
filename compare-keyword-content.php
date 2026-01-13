<?php

// Check which has complete content
$current = include __DIR__ . '/resources/lang/en/tools/seo.php';
$original = include __DIR__ . '/original-seo-en.php';

echo "=== COMPARING CONTENT ===\n\n";

// Check keyword-density in original
if (isset($original['keyword-density'])) {
    $kdSections = array_keys($original['keyword-density']);
    echo "Original keyword-density sections: " . implode(', ', $kdSections) . "\n";
    echo "  Content keys: " . (isset($original['keyword-density']['content']) ? count($original['keyword-density']['content']) : 0) . "\n";
    echo "  Guidelines: " . (isset($original['keyword-density']['guidelines']) ? 'YES' : 'NO') . "\n";
    echo "  Features: " . (isset($original['keyword-density']['features']) ? 'YES' : 'NO') . "\n";
    echo "  Best practices: " . (isset($original['keyword-density']['best_practices']) ? 'YES' : 'NO') . "\n";
    echo "  FAQ: " . (isset($original['keyword-density']['faq']) ? 'YES' : 'NO') . "\n";
}

echo "\n";

// Check keyword-density-checker in original
if (isset($original['keyword-density-checker'])) {
    $kdcSections = array_keys($original['keyword-density-checker']);
    echo "Original keyword-density-checker sections: " . implode(', ', $kdcSections) . "\n";
    echo "  Content keys: " . (isset($original['keyword-density-checker']['content']) ? count($original['keyword-density-checker']['content']) : 0) . "\n";
    echo "  Guidelines: " . (isset($original['keyword-density-checker']['guidelines']) ? 'YES' : 'NO') . "\n";
    echo "  Features: " . (isset($original['keyword-density-checker']['features']) ? 'YES' : 'NO') . "\n";
    echo "  Best practices: " . (isset($original['keyword-density-checker']['best_practices']) ? 'YES' : 'NO') . "\n";
    echo "  FAQ: " . (isset($original['keyword-density-checker']['faq']) ? 'YES' : 'NO') . "\n";
}

echo "\n";

// Check current state
if (isset($current['keyword-density'])) {
    echo "Current has keyword-density\n";
}
if (isset($current['keyword-density-checker'])) {
    $currentSections = array_keys($current['keyword-density-checker']);
    echo "Current keyword-density-checker sections: " . implode(', ', $currentSections) . "\n";
}
