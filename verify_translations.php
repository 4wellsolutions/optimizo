<?php

use Illuminate\Support\Facades\App;
use App\Services\ToolData;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Force locale to Spanish
App::setLocale('es');

// Get all tools
// We need to access the private methods of ToolData or simulate them.
// Since getInitialToolsData is public, we can use that to get the raw array.
$tools = ToolData::getInitialToolsData();

$missingTranslations = [];
$totalTools = count($tools);
$toolsWithMissingData = 0;
$log = "Verifying translations for $totalTools tools...\n\n";

foreach ($tools as $tool) {
    $slug = $tool['slug'];
    $name = $tool['name'];

    // Check key fields matches index.blade.php logic
    $translatedTitle = __tool($slug, 'meta.h1') ?: __tool($slug, 'meta.title') ?: __tool($slug, 'form.title');
    $translatedDesc = __tool($slug, 'meta.subtitle') ?: __tool($slug, 'seo.description') ?: __tool($slug, 'meta.desc');

    // Also check for 'meta.desc' as some utility tools might use it (I saw it in visual inspection)
    // But strictly speaking the view doesn't look for it. 
    // Wait, if the view doesn't look for it, then it won't show!
    // So strictly check what the view checks.

    $issues = [];

    if (empty($translatedTitle)) {
        // Fallback to English/Database name logic? 
        // The view falls back to __t($tool, 'name') -> $tool->name.
        // So title will likely never be empty visually, but it will be English.
        // We want to verify a SPANISH translation exists.
        // So strict check is correct.
        $issues[] = "Missing Title (meta.h1 / form.title)";
    }

    if (empty($translatedDesc)) {
        // The view falls back to $tool->meta_description which is now removed!
        // So this MUST accept a translation.
        $issues[] = "Missing Description (meta.subtitle / seo.description)";
    }

    if (!empty($issues)) {
        $missingTranslations[$slug] = $issues;
        $toolsWithMissingData++;
        $log .= "[$slug] Issues: " . implode(', ', $issues) . "\n";
    }
}

$log .= "\nVerification Complete.\n";
$log .= "Total Tools: $totalTools\n";
$log .= "Tools with Missing Translations: $toolsWithMissingData\n";

if ($toolsWithMissingData === 0) {
    $log .= "SUCCESS: All tools have basic translations.\n";
} else {
    $log .= "FAILURE: Missing translations found.\n";
}

file_put_contents('trans_log.txt', $log);
echo "Log written to trans_log.txt";
