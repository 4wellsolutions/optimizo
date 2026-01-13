<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Get YouTube tools from database
$tools = \App\Models\Tool::whereHas('categoryRelation', function ($q) {
    $q->where('slug', 'youtube');
})->orderBy('slug')->get(['slug']);

// Get translation keys from youtube.php
$translations = require resource_path('lang/en/tools/youtube.php');
$translationKeys = array_keys($translations);

echo "=== DATABASE TOOL SLUGS ===\n";
$dbSlugs = $tools->pluck('slug')->toArray();
foreach ($dbSlugs as $slug) {
    echo "- $slug\n";
}

echo "\n=== TRANSLATION FILE KEYS ===\n";
foreach ($translationKeys as $key) {
    echo "- $key\n";
}

echo "\n=== MISMATCHES ===\n";
echo "Tools in DB but NOT in translations:\n";
foreach ($dbSlugs as $slug) {
    if (!in_array($slug, $translationKeys)) {
        echo "❌ $slug (DB only)\n";
    }
}

echo "\nTools in translations but NOT in DB:\n";
foreach ($translationKeys as $key) {
    if (!in_array($key, $dbSlugs)) {
        echo "❌ $key (Translation only)\n";
    }
}

echo "\n=== MATCHED TOOLS ===\n";
foreach ($dbSlugs as $slug) {
    if (in_array($slug, $translationKeys)) {
        echo "✅ $slug\n";
    }
}
