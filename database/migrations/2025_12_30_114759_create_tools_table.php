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

            // Foreign Key for Category
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();

            $table->string('name'); // Tool display name
            $table->string('slug')->unique(); // URL-friendly identifier
            $table->string('icon_name')->nullable(); // Icon identifier/name

            $table->string('controller'); // Controller class name
            $table->string('route_name')->unique(); // Laravel route name
            $table->string('url')->unique(); // Full URL path
            $table->boolean('is_active')->default(true); // Tool visibility
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
