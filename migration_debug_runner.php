<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;

try {
    echo "Attempting to add category_id to tools...\n";
    Schema::table('tools', function (Blueprint $table) {
        if (!Schema::hasColumn('tools', 'category_id')) {
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            echo "Added category_id and FK.\n";
        } else {
            echo "category_id already exists.\n";
        }
    });

    echo "Attempting to modify category column...\n";
    DB::statement("ALTER TABLE tools MODIFY COLUMN category VARCHAR(255) NULL");
    echo "Modified category column.\n";

    echo "Attempting to add type to categories...\n";
    Schema::table('categories', function (Blueprint $table) {
        if (!Schema::hasColumn('categories', 'type')) {
            $table->string('type')->default('post')->after('slug')->index();
            echo "Added type to categories.\n";
        } else {
            echo "type already exists in categories.\n";
        }
    });

    echo "Migration steps completed successfully manually.\n";

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}
