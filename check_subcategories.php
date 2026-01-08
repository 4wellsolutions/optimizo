<?php

use App\Models\Tool;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$toolsWithSub = Tool::whereNotNull('subcategory_id')->count();
$totalTools = Tool::count();

echo "Total Tools: $totalTools\n";
echo "Tools with Subcategory: $toolsWithSub\n";

if ($toolsWithSub > 0) {
    $example = Tool::whereNotNull('subcategory_id')->with('subcategoryRelation')->first();
    echo "Example: {$example->name} -> Subcat ID: {$example->subcategory_id} -> Name: " . ($example->subcategoryRelation ? $example->subcategoryRelation->name : 'RELATION NULL') . "\n";
}
