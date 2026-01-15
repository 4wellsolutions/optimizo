<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

// Get the Document category
$documentCategory = DB::table('categories')->where('slug', 'document')->first();

if (!$documentCategory) {
    echo "Document category not found!\n";
    exit;
}

echo "Document Category ID: {$documentCategory->id}\n\n";

// Get all tools in the Document category
$documentTools = DB::table('tools')
    ->where('category_id', $documentCategory->id)
    ->get(['id', 'name', 'slug', 'route_name']);

echo "Document tools found: " . $documentTools->count() . "\n\n";

foreach ($documentTools as $tool) {
    echo "- {$tool->name}\n";
    echo "  Slug: {$tool->slug}\n";
    echo "  Current route: {$tool->route_name}\n";
    echo "  New route: document.{$tool->slug}\n\n";
}
