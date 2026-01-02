<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('tools')->insert([
            'name' => 'Redirect & HTTP Status Checker',
            'slug' => 'redirect-checker',
            'category' => 'seo',
            'subcategory' => 'SEO Analysis',
            'route_name' => 'network.redirect-checker',
            'description' => 'Check HTTP status codes, analyze redirect chains, detect 301/302 redirects, find broken redirects and redirect loops',
            'meta_title' => 'Redirect Checker & HTTP Status Code Tool - Free Online',
            'meta_description' => 'Free redirect checker tool to analyze HTTP status codes, trace redirect chains, detect 301/302 redirects, find broken redirects and redirect loops. Essential for SEO and website debugging.',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('tools')->where('slug', 'redirect-checker')->delete();
    }
};
