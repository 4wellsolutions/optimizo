<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

echo "Database Connection: " . DB::connection()->getDriverName() . "\n";
echo "Has 'tools' table: " . (Schema::hasTable('tools') ? 'YES' : 'NO') . "\n";
echo "Has 'categories' table: " . (Schema::hasTable('categories') ? 'YES' : 'NO') . "\n";

if (Schema::hasTable('languages')) {
    echo "Languages columns: " . implode(', ', Schema::getColumnListing('languages')) . "\n";
} else {
    echo "Table 'languages' does not exist.\n";
}
if (Schema::hasTable('tools')) {
    echo "Tools columns: " . implode(', ', Schema::getColumnListing('tools')) . "\n";
}
