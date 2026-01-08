<?php

use App\Models\Tool;
use App\Models\Category;
use App\Services\ToolData;
use Illuminate\Support\Str;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$toolsData = ToolData::getInitialToolsData();
$updatedCount = 0;

echo "Starting synchronization of " . count($toolsData) . " tools...\n\n";

foreach ($toolsData as $data) {
    if (!isset($data['slug']))
        continue;

    $tool = Tool::where('slug', $data['slug'])->first();

    if (!$tool) {
        echo "[SKIP] Tool not found: " . $data['name'] . "\n";
        continue;
    }

    // Resolve Category ID
    $categorySlug = is_string($data['category']) ? $data['category'] : 'other';
    $parentCategory = Category::where('slug', $categorySlug)->first();

    $assignedCategoryId = null;

    if ($parentCategory) {
        $assignedCategoryId = $parentCategory->id;

        // Check Subcategory
        if (!empty($data['subcategory'])) {
            $subSlug = Str::slug($parentCategory->slug . '-' . $data['subcategory']);
            $childCategory = Category::where('slug', $subSlug)
                ->where('parent_id', $parentCategory->id)
                ->first();

            if ($childCategory) {
                $assignedCategoryId = $childCategory->id;
            } else {
                // Try loose matching on name if slug fails?
                $childCategory = Category::where('name', $data['subcategory'])
                    ->where('parent_id', $parentCategory->id)
                    ->first();
                if ($childCategory)
                    $assignedCategoryId = $childCategory->id;
            }
        }
    } else {
        echo "[WARN] Parent Category not found: $categorySlug for tool {$tool->name}\n";
    }

    if ($assignedCategoryId && $tool->category_id !== $assignedCategoryId) {
        $oldId = $tool->category_id;
        $tool->category_id = $assignedCategoryId;
        $tool->save();
        echo "[UPDATE] Tool: {$tool->name} ({$tool->slug}) | CatID: $oldId -> $assignedCategoryId\n";
        $updatedCount++;
    }
}

echo "\nSync Complete. Updated $updatedCount tools.\n";
