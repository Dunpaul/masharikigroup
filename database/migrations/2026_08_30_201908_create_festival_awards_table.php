<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_awards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_edition_id')->constrained()->cascadeOnDelete();
            $table->string('category');
            $table->foreignId('winner_film_id')->nullable()->constrained('festival_films')->nullOnDelete();
            $table->string('winner_name')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_awards');
    }
};
