<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Tool;

$tool = Tool::first();
echo "Slug: {$tool->slug}\n";
echo "Controller: {$tool->controller}\n";
echo "Route Name: {$tool->route_name}\n";
