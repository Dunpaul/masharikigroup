<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_screenings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_film_id')->constrained()->cascadeOnDelete();
            $table->foreignId('festival_venue_id')->constrained()->cascadeOnDelete();
            $table->string('hall')->nullable();
            $table->date('screening_date');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->string('ticket_url')->nullable();
            $table->boolean('sold_out')->default(false);
            $table->boolean('has_qna')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_screenings');
    }
};
