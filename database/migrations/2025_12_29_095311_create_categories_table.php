<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->default('post')->index(); // 'post', 'tool'
            $table->text('description')->nullable();
            $table->string('bg_gradient_from')->nullable(); // Gradient start color
            $table->string('bg_gradient_to')->nullable(); // Gradient end color
            $table->string('text_color')->nullable(); // Text color class
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
