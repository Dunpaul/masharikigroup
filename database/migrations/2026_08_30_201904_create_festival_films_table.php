<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_films', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_edition_id')->constrained()->cascadeOnDelete();
            $table->foreignId('festival_section_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->string('original_title')->nullable();
            $table->string('director')->nullable();
            $table->string('country')->nullable();
            $table->unsignedInteger('release_year')->nullable();
            $table->unsignedInteger('runtime_minutes')->nullable();
            $table->string('language')->nullable();
            $table->string('subtitles')->nullable();
            $table->text('synopsis')->nullable();
            $table->string('poster_path')->nullable();
            $table->json('stills')->nullable();
            $table->string('trailer_url')->nullable();
            $table->string('content_rating')->nullable();
            $table->text('prior_awards_text')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['festival_edition_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_films');
    }
};
