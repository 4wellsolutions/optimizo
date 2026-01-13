<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Language;

// Check existing
$count = Language::count();
$maxOrder = Language::max('order');

echo "Current Languages: $count\n";
echo "Max Order: $maxOrder\n";

$es = Language::updateOrCreate(
    ['code' => 'es'],
    [
        'name' => 'Spanish',
        'native_name' => 'Español',
        'flag_icon' => '🇪🇸',
        'is_active' => true,
        'is_default' => false,
        'direction' => 'ltr',
        'order' => $maxOrder + 1
    ]
);

echo "Spanish language added/updated successfully.\n";
print_r($es->toArray());
