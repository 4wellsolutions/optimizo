<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Finding Time Tools ===\n\n";

$timeTools = DB::table('tools')
    ->where('name', 'LIKE', '%Time%')
    ->orWhere('name', 'LIKE', '%UTC%')
    ->orWhere('name', 'LIKE', '%Unix%')
    ->orWhere('name', 'LIKE', '%Epoch%')
    ->orWhere('name', 'LIKE', '%Zone%')
    ->get(['id', 'name', 'slug', 'route_name', 'category_id']);

foreach ($timeTools as $tool) {
    $category = DB::table('categories')->where('id', $tool->category_id)->first();
    echo "- {$tool->name}\n";
    echo "  Slug: {$tool->slug}\n";
    echo "  Current route: {$tool->route_name}\n";
    echo "  Category: {$category->name}\n\n";
}
