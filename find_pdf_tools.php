<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

// List all categories
echo "=== All Categories ===\n";
$categories = DB::table('categories')->get(['id', 'name', 'slug']);
foreach ($categories as $cat) {
    echo "{$cat->id}. {$cat->name} (slug: {$cat->slug})\n";
}

echo "\n=== PDF/Document Tools ===\n";
$pdfTools = DB::table('tools')
    ->where('name', 'LIKE', '%PDF%')
    ->orWhere('name', 'LIKE', '%Word%')
    ->orWhere('name', 'LIKE', '%Excel%')
    ->orWhere('name', 'LIKE', '%PowerPoint%')
    ->get(['id', 'name', 'slug', 'route_name', 'category_id']);

foreach ($pdfTools as $tool) {
    $category = DB::table('categories')->where('id', $tool->category_id)->first();
    echo "\n- {$tool->name}\n";
    echo "  Slug: {$tool->slug}\n";
    echo "  Current route: {$tool->route_name}\n";
    echo "  Category: {$category->name} (ID: {$tool->category_id})\n";
}
