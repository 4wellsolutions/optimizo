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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('language_code', 10)->default('en')->after('status')->index();
        });

        Schema::table('blog_categories', function (Blueprint $table) {
            $table->string('language_code', 10)->default('en')->after('slug')->index();
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->string('language_code', 10)->default('en')->after('slug')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('language_code');
        });

        Schema::table('blog_categories', function (Blueprint $table) {
            $table->dropColumn('language_code');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('language_code');
        });
    }
};
