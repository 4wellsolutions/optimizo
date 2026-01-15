<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

// Get the Image category
$imageCategory = DB::table('categories')->where('slug', 'image')->first();

if (!$imageCategory) {
    echo "Image category not found!\n";
    exit;
}

echo "Image Category ID: {$imageCategory->id}\n\n";

// Get all tools in the Image category
$imageTools = DB::table('tools')
    ->where('category_id', $imageCategory->id)
    ->get(['id', 'name', 'slug']);

echo "Image tools found: " . $imageTools->count() . "\n\n";

foreach ($imageTools as $tool) {
    echo "- {$tool->name}\n";
    echo "  Slug: {$tool->slug}\n";
    echo "  Expected route: image.{$tool->slug}\n\n";
}
