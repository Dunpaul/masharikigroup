<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_film_guest', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_film_id')->constrained()->cascadeOnDelete();
            $table->foreignId('festival_guest_id')->constrained()->cascadeOnDelete();
            $table->string('role_on_film')->nullable();
            $table->timestamps();

            $table->unique(['festival_film_id', 'festival_guest_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_film_guest');
    }
};
