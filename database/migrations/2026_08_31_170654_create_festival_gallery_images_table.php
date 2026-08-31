<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('festival_gallery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_edition_id')->constrained()->cascadeOnDelete();
            $table->date('day')->nullable();
            $table->string('category')->nullable();
            $table->string('image_path'); // compressed full-size WebP
            $table->string('thumb_path'); // compressed thumbnail WebP
            $table->string('caption')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['festival_edition_id', 'day']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festival_gallery_images');
    }
};
