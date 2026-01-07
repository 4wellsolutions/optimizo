<?php

use App\Models\Language;
use App\Models\Tool;
use App\Models\Translation;

// Check languages
echo "=== Languages ===\n";
$languages = Language::all();
foreach ($languages as $lang) {
    echo "ID: {$lang->id}, Code: {$lang->code}, Name: {$lang->name}, Active: " . ($lang->is_active ? 'Yes' : 'No') . "\n";
}

// Check QR Code Generator tool
echo "\n=== QR Code Generator Tool ===\n";
$tool = Tool::where('slug', 'qr-code-generator')->first();
if ($tool) {
    echo "Tool ID: {$tool->id}\n";
    echo "Tool Name: {$tool->name}\n";

    // Check translations
    echo "\n=== Translations for this tool ===\n";
    $translations = Translation::where('translatable_type', 'App\Models\Tool')
        ->where('translatable_id', $tool->id)
        ->get();

    foreach ($translations as $trans) {
        $lang = Language::find($trans->language_id);
        echo "Lang: {$lang->code}, Field: {$trans->field}, Value: {$trans->value}\n";
    }
} else {
    echo "Tool not found!\n";
}

// Test translation helper
echo "\n=== Testing __t() helper ===\n";
app()->setLocale('ru');
echo "Current locale: " . app()->getLocale() . "\n";
if ($tool) {
    echo "Translated name: " . __t($tool, 'name') . "\n";
}
