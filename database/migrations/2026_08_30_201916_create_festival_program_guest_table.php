<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_program_guest', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('festival_guest_id')->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['festival_program_id', 'festival_guest_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_program_guest');
    }
};
