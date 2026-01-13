<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$categories = ['seo', 'utility', 'network', 'converters'];
$allMismatches = [];

foreach ($categories as $category) {
    // Get tools from database
    $tools = \App\Models\Tool::whereHas('categoryRelation', function ($q) use ($category) {
        $q->where('slug', $category);
    })->orWhereHas('subcategoryRelation', function ($q) use ($category) {
        $q->where('slug', $category);
    })->orderBy('slug')->get(['slug']);

    $dbSlugs = $tools->pluck('slug')->unique()->toArray();

    // Get translation keys
    $translationFile = resource_path("lang/en/tools/{$category}.php");
    if (!file_exists($translationFile)) {
        continue;
    }

    $translations = require $translationFile;
    $translationKeys = array_keys($translations);

    // Find mismatches
    $dbOnly = array_diff($dbSlugs, $translationKeys);
    $transOnly = array_diff($translationKeys, $dbSlugs);

    if (!empty($dbOnly) || !empty($transOnly)) {
        $allMismatches[$category] = [
            'db_only' => $dbOnly,
            'trans_only' => $transOnly,
        ];
    }
}

if (empty($allMismatches)) {
    echo "✅ All tool categories have matching translation keys!\n";
} else {
    echo "⚠️  MISMATCHES FOUND:\n\n";
    foreach ($allMismatches as $category => $mismatches) {
        echo "=== {$category} ===\n";
        if (!empty($mismatches['db_only'])) {
            echo "  Tools in DB but NOT in translations:\n";
            foreach ($mismatches['db_only'] as $slug) {
                echo "    ❌ $slug\n";
            }
        }
        if (!empty($mismatches['trans_only'])) {
            echo "  Keys in translations but NOT in DB:\n";
            foreach ($mismatches['trans_only'] as $key) {
                echo "    ❌ $key\n";
            }
        }
        echo "\n";
    }
}
