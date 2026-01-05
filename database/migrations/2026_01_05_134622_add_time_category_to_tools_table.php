<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // MySQL doesn't support modifying enums directly, so we need to alter the column
        DB::statement("ALTER TABLE tools MODIFY COLUMN category ENUM('utility', 'youtube', 'seo', 'network', 'time', 'document', 'spreadsheet') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original enum values
        DB::statement("ALTER TABLE tools MODIFY COLUMN category ENUM('utility', 'youtube', 'seo', 'network') NOT NULL");
    }
};
