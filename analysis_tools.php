<?php

use App\Models\Tool;
use App\Models\Category;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$tools = Tool::all();
$categories = Category::all()->keyBy('slug'); // tool categories

echo "Total Tools: " . $tools->count() . "\n";
echo "Total Categories: " . $categories->count() . "\n\n";

$missingCategory = 0;
$mismatch = 0;

foreach ($tools as $tool) {
    if (!$tool->category_id) {
        $missingCategory++;
        echo "[MISSING ID] Tool: {$tool->name} ({$tool->slug}) - Legacy Cat: {$tool->category}\n";

        // Try to find it
        $slug = $tool->category;
        if ($tool->subcategory) {
            // Logic to find subcategory slug? 
            // ToolData uses 'subcategory' name, CategorySeeder creates slug: parentSlug-subName
            // But let's check basic parent match first
        }
    } else {
        // Validation?
    }
}

echo "\nTools with missing category_id: $missingCategory\n";
