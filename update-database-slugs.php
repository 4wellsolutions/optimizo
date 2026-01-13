<?php

/**
 * Check and update database tool slugs for renamed utilities
 */

$pdo = new PDO('mysql:host=localhost;dbname=optimizo', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "=== CHECKING DATABASE TOOL SLUGS ===\n\n";

$renamedTools = [
    'html-to-markdown' => 'html-to-markdown-converter',
    'json-to-yaml' => 'json-to-yaml-converter',
    'markdown-to-html' => 'markdown-to-html-converter',
    'qr-generator' => 'qr-code-generator',
    'url-encoder' => 'url-encoder-decoder',
    'csv-to-json' => 'csv-to-json-converter',
    'csv-to-tsv' => 'csv-to-tsv-converter',
    'csv-to-xml' => 'csv-to-xml-converter',
    'json-to-csv' => 'json-to-csv-converter',
    'json-to-sql' => 'json-to-sql-converter',
    'unicode-decoder' => 'base64-encoder-decoder',
];

$updated = 0;

foreach ($renamedTools as $oldSlug => $newSlug) {
    // Check if old slug exists
    $stmt = $pdo->prepare("SELECT id, name, slug FROM tools WHERE slug = ?");
    $stmt->execute([$oldSlug]);
    $oldTool = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if new slug exists
    $stmt = $pdo->prepare("SELECT id, name FROM tools WHERE slug = ?");
    $stmt->execute([$newSlug]);
    $newTool = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($oldTool && !$newTool) {
        // Update old slug to new slug
        $updateStmt = $pdo->prepare("UPDATE tools SET slug = ? WHERE slug = ?");
        $updateStmt->execute([$newSlug, $oldSlug]);
        echo "✅ Updated: {$oldTool['name']} ($oldSlug → $newSlug)\n";
        $updated++;
    } elseif ($newTool) {
        echo "⏭️  Skip: $newSlug (already exists)\n";
    } elseif (!$oldTool && !$newTool) {
        echo "❌ Missing: Both $oldSlug and $newSlug not found in database\n";
    }
}

echo "\n" . str_repeat("=", 70) . "\n";
echo "Total tools updated in database: $updated\n";
echo str_repeat("=", 70) . "\n";

if ($updated > 0) {
    echo "\n✅ Database slugs updated! Clear cache if needed:\n";
    echo "   php artisan cache:clear\n";
}
