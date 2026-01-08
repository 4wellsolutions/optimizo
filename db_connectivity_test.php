<?php

use App\Models\Tool;
use App\Services\ToolData;
use Illuminate\Support\Facades\Schema;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$toolsData = ToolData::getInitialToolsData();

// Just check one tool to verify data is accessible
$testTool = Tool::first();
echo "Test Tool accessible: " . ($testTool ? $testTool->name : 'No tools found') . "\n";
