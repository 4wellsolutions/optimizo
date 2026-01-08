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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();

            // Foreign Keys for Category and Subcategory
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained('categories')->nullOnDelete();

            $table->string('name'); // Tool display name
            $table->string('slug')->unique(); // URL-friendly identifier

            $table->text('icon_svg')->nullable(); // SVG markup for tool icon
            $table->string('icon_name')->nullable(); // Icon identifier/name

            $table->text('description')->nullable();
            $table->longText('content')->nullable();

            $table->string('controller'); // Controller class name
            $table->string('route_name')->unique(); // Laravel route name
            $table->string('url')->unique(); // Full URL path
            $table->string('meta_title')->nullable(); // SEO title tag
            $table->text('meta_description')->nullable(); // SEO description
            $table->text('meta_keywords')->nullable(); // SEO keywords
            $table->boolean('is_active')->default(true); // Tool visibility
            $table->decimal('priority', 2, 1)->default(0.8); // Sitemap priority (0.0-1.0)
            $table->enum('change_frequency', ['always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never'])->default('weekly'); // Sitemap change frequency
            $table->integer('order')->default(0); // Display order
            $table->timestamps();

            // Indexes for performance
            $table->index('is_active');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
