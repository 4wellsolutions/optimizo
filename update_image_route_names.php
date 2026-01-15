<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Update route names for all image tools (category_id = 5)
$updated = DB::table('tools')
    ->where('category_id', 5)
    ->update([
            'route_name' => DB::raw("REPLACE(route_name, 'utility.', 'image.')")
        ]);

echo "Updated {$updated} image tool route names from 'utility.*' to 'image.*'\n";
