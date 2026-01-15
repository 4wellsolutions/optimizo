<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Fix route name for internet-speed-test
DB::table('tools')
    ->where('slug', 'internet-speed-test')
    ->update(['route_name' => 'utility.speed-test']);

echo "Fixed internet-speed-test route name from 'utility.internet-speed-test' to 'utility.speed-test'\n";
