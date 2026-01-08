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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('bg_gradient_from')->nullable()->after('description');
            $table->string('bg_gradient_to')->nullable()->after('bg_gradient_from');
            $table->string('text_color')->default('text-white')->after('bg_gradient_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['bg_gradient_from', 'bg_gradient_to', 'text_color']);
        });
    }
};
