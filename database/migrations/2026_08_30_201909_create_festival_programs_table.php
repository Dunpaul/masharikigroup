<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_edition_id')->constrained()->cascadeOnDelete();
            $table->foreignId('festival_venue_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('type')->default('panel'); // panel | masterclass | workshop | ceremony
            $table->text('description')->nullable();
            $table->date('event_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_programs');
    }
};
