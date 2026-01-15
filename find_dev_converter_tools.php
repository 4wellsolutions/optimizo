<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Finding Development Tools ===\n\n";

$devKeywords = ['JSON', 'XML', 'HTML', 'JavaScript', 'CSS', 'Code', 'Curl', 'Cron', 'UUID', 'GUID', 'MD5', 'URL Encoder', 'Unicode', 'JWT', 'Base64', 'Markdown', 'Viewer', 'Formatter', 'Parser', 'Minifier'];

$devTools = DB::table('tools')
    ->where(function ($query) use ($devKeywords) {
        foreach ($devKeywords as $keyword) {
            $query->orWhere('name', 'LIKE', "%{$keyword}%");
        }
    })
    ->get(['id', 'name', 'slug', 'route_name', 'category_id']);

echo "Found " . $devTools->count() . " development tools:\n\n";
foreach ($devTools as $tool) {
    $category = DB::table('categories')->where('id', $tool->category_id)->first();
    $categoryName = $category ? $category->name : 'No Category';
    echo "- {$tool->name}\n";
    echo "  Slug: {$tool->slug}\n";
    echo "  Current route: " . ($tool->route_name ?? 'None') . "\n";
    echo "  Category: {$categoryName}\n\n";
}

echo "\n=== Finding Converter Tools ===\n\n";

$converterKeywords = ['Frequency', 'Molar', 'Density', 'Torque', 'Cooking', 'Data Transfer', 'Fuel', 'Angle', 'Force', 'Power', 'Pressure', 'Energy', 'Storage', 'Speed', 'Area', 'Volume', 'Temperature', 'Weight', 'Length', 'Number Base', 'Octal', 'Hexadecimal', 'Binary', 'ASCII', 'RGB', 'HEX', 'Studly', 'Snake', 'Sentence', 'Pascal', 'Kebab', 'Camel', 'Case Converter'];

$converterTools = DB::table('tools')
    ->where(function ($query) use ($converterKeywords) {
        foreach ($converterKeywords as $keyword) {
            $query->orWhere('name', 'LIKE', "%{$keyword}%");
        }
    })
    ->get(['id', 'name', 'slug', 'route_name', 'category_id']);

echo "Found " . $converterTools->count() . " converter tools:\n\n";
foreach ($converterTools as $tool) {
    $category = DB::table('categories')->where('id', $tool->category_id)->first();
    $categoryName = $category ? $category->name : 'No Category';
    echo "- {$tool->name}\n";
    echo "  Slug: {$tool->slug}\n";
    echo "  Current route: " . ($tool->route_name ?? 'None') . "\n";
    echo "  Category: {$categoryName}\n\n";
}
