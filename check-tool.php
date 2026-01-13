<?php

$pdo = new PDO('mysql:host=localhost;dbname=optimizo', 'root', '');
$stmt = $pdo->query("SELECT slug, name, meta_title, meta_description FROM tools WHERE slug = 'html-to-markdown-converter' LIMIT 1");
$tool = $stmt->fetch(PDO::FETCH_ASSOC);

if ($tool) {
    echo "Tool found:\n";
    print_r($tool);
} else {
    echo "Tool NOT found with slug: html-to-markdown-converter\n";
}
