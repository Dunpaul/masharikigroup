<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_submission_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_edition_id')->constrained()->cascadeOnDelete();
            $table->text('guidelines')->nullable();
            $table->text('categories')->nullable();
            $table->date('deadline_early')->nullable();
            $table->date('deadline_regular')->nullable();
            $table->date('deadline_late')->nullable();
            $table->text('fees')->nullable();
            $table->string('filmfreeway_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_submission_infos');
    }
};
