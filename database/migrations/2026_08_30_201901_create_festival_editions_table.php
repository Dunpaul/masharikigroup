<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_editions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('year');
            $table->unsignedInteger('edition_number');
            $table->string('theme_name')->nullable();
            $table->text('theme_statement')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('tagline')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('status')->default('upcoming'); // upcoming | current | archived
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_editions');
    }
};
