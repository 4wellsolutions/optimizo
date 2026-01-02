<?php

use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Update YouTube tools
DB::table('tools')
    ->where('category', 'youtube')
    ->get()
    ->each(function ($tool) {
        DB::table('tools')
            ->where('id', $tool->id)
            ->update(['route_name' => str_replace('tools.', 'youtube.', $tool->route_name)]);
    });

// Update SEO tools
DB::table('tools')
    ->where('category', 'seo')
    ->get()
    ->each(function ($tool) {
        DB::table('tools')
            ->where('id', $tool->id)
            ->update(['route_name' => str_replace('tools.', 'seo.', $tool->route_name)]);
    });

// Update Utility tools
DB::table('tools')
    ->where('category', 'utility')
    ->get()
    ->each(function ($tool) {
        DB::table('tools')
            ->where('id', $tool->id)
            ->update(['route_name' => str_replace('tools.', 'utility.', $tool->route_name)]);
    });

// Update Network tools
DB::table('tools')
    ->where('category', 'network')
    ->get()
    ->each(function ($tool) {
        DB::table('tools')
            ->where('id', $tool->id)
            ->update(['route_name' => str_replace('tools.', 'network.', $tool->route_name)]);
    });

echo "All route names updated successfully!\n";
