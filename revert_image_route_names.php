<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Revert route names for all image tools back to 'utility.*'
$updated = DB::table('tools')
    ->where('category_id', 5)
    ->update([
            'route_name' => DB::raw("REPLACE(route_name, 'image.', 'utility.')")
        ]);

echo "Reverted {$updated} image tool route names from 'image.*' back to 'utility.*'\n";
