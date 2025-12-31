<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('redirects', function (Blueprint $table) {
            $table->id();
            $table->string('from_url');
            $table->string('to_url');
            $table->enum('type', ['301', '302'])->default('301');
            $table->boolean('status')->default(true);
            $table->integer('hits')->default(0);
            $table->timestamps();

            $table->index('from_url');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redirects');
    }
};
