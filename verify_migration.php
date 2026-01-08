<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo "Fetching tools from Database via ToolData service...\n";
    $tools = \App\Services\ToolData::getTools();

    if ($tools instanceof \Illuminate\Support\Collection) {
        echo "Success: distinct tool count: " . $tools->count() . "\n";

        $tool = $tools->first();
        if ($tool) {
            echo "Sample Tool: " . $tool->name . "\n";
            echo "Category (Legacy String): " . $tool->category . "\n";
            echo "Category (Relation Name): " . ($tool->categoryRelation ? $tool->categoryRelation->name : 'N/A') . "\n";
        }
    } else {
        echo "Error: getTools() returned " . gettype($tools) . "\n";
    }

    $slug = 'internet-speed-test';
    $t = \App\Services\ToolData::getToolBySlug($slug);
    if ($t) {
        echo "Fetched '$slug' by slug: " . $t->name . "\n";
    } else {
        echo "Failed to fetch '$slug' by slug (might be missing in seed data?)\n";
    }

} catch (\Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
