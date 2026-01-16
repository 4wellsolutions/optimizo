<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Language;

foreach (Language::active()->get() as $lang) {
    echo "Code: {$lang->code} | Default: {$lang->is_default}\n";
}
