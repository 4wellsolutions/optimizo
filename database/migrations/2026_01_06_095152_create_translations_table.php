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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->constrained()->onDelete('cascade');
            $table->morphs('translatable'); // translatable_type, translatable_id
            $table->string('field', 100); // e.g., 'name', 'description', 'meta_title'
            $table->text('value');
            $table->timestamps();

            $table->index(['translatable_type', 'translatable_id']);
            $table->index(['language_id', 'field']);
            $table->unique(['language_id', 'translatable_type', 'translatable_id', 'field'], 'unique_translation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
