<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Finding Text Tools ===\n\n";

$textTools = DB::table('tools')
    ->where(function ($query) {
        $query->where('name', 'LIKE', '%Word Counter%')
            ->orWhere('name', 'LIKE', '%Duplicate%')
            ->orWhere('name', 'LIKE', '%Difference%')
            ->orWhere('name', 'LIKE', '%Morse%')
            ->orWhere('name', 'LIKE', '%Text Reverser%')
            ->orWhere('name', 'LIKE', '%Lorem Ipsum%');
    })
    ->get(['id', 'name', 'slug', 'route_name', 'category_id']);

foreach ($textTools as $tool) {
    $category = DB::table('categories')->where('id', $tool->category_id)->first();
    $categoryName = $category ? $category->name : 'No Category';
    echo "- {$tool->name}\n";
    echo "  Slug: {$tool->slug}\n";
    echo "  Current route: " . ($tool->route_name ?? 'None') . "\n";
    echo "  Category: {$categoryName}\n\n";
}
