<?php

use App\Models\Tool;
use App\Models\Category;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Migrating existing tool category IDs...\n";

$tools = Tool::all();
$updated = 0;

foreach ($tools as $tool) {
    if (!$tool->category_id)
        continue;

    $dbCategory = Category::find($tool->category_id);
    if (!$dbCategory) {
        echo "[WARN] Tool {$tool->slug} has invalid category_id {$tool->category_id}\n";
        continue;
    }

    if ($dbCategory->parent_id) {
        // Current category_id is actually a child (Subcategory)
        // We need to:
        // 1. Move it to subcategory_id
        // 2. Set category_id to the parent
        $tool->subcategory_id = $dbCategory->id;
        $tool->category_id = $dbCategory->parent_id;
        $tool->save();
        $updated++;
        echo "[FIX] Tool {$tool->slug}: Set CatID={$dbCategory->parent_id}, SubID={$dbCategory->id}\n";
    } elseif ($tool->subcategory_id) {
        // Already has subcategory_id, check consistency?
        // If category_id is parent, and subcategory_id is set - GOOD.
    }
}

echo "Migration Complete. Updated $updated tools.\n";
