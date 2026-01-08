<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$tools = \App\Models\Tool::count();
echo "Total active tools in DB: " . $tools . PHP_EOL;

$toolData = \App\Services\ToolData::getInitialToolsData();
echo "Total tools in ToolData: " . count($toolData) . PHP_EOL;
