<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$tools = DB::table('tools')
    ->select('slug', 'category')
    ->orderBy('category')
    ->orderBy('slug')
    ->get();

echo json_encode($tools, JSON_PRETTY_PRINT);
