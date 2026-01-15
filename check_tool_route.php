<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

// Check the jpg-to-png-converter tool
$tool = DB::table('tools')
    ->where('slug', 'jpg-to-png-converter')
    ->first();

if ($tool) {
    echo "Tool found:\n";
    echo "ID: {$tool->id}\n";
    echo "Name: {$tool->name}\n";
    echo "Slug: {$tool->slug}\n";
    echo "Category ID: {$tool->category_id}\n";
    echo "Is Active: " . ($tool->is_active ? 'Yes' : 'No') . "\n";

    $category = DB::table('categories')->where('id', $tool->category_id)->first();
    if ($category) {
        echo "Category: {$category->name} (slug: {$category->slug})\n";
    }

    echo "\nExpected route name: {$category->slug}.{$tool->slug}\n";
    echo "Actual route in web.php: utility.jpg-to-png\n";
} else {
    echo "Tool not found\n";
}
