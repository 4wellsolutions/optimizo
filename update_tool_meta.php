<?php

use App\Models\Tool;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$tools = Tool::all();
$updatedCount = 0;

foreach ($tools as $tool) {
    echo "Processing: " . $tool->name . "\n";
    $updated = false;

    if (empty($tool->meta_title)) {
        $tool->meta_title = $tool->name . ' - Free Online Tool';
        $updated = true;
    }

    if (empty($tool->meta_keywords)) {
        // Generate simple keywords from name
        $keywords = strtolower($tool->name);
        $keywords = str_replace(' ', ', ', $keywords);
        $keywords .= ', free tool, online tool';
        $tool->meta_keywords = $keywords;
        $updated = true;
    }

    if ($updated) {
        $tool->save();
        $updatedCount++;
        echo " - Updated meta data\n";
    }
}

echo "\nDone! Updated $updatedCount tools.\n";
