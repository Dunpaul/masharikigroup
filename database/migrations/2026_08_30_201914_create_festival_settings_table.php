<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('festival_settings', function (Blueprint $table) {
            $table->id();
            $table->string('canonical_name')->default('Mashariki African Film Festival');
            $table->string('acronym')->default('MAAFF');
            $table->string('media_kit_path')->nullable();
            $table->text('accreditation_info')->nullable();
            $table->string('press_contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->json('socials')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('festival_settings');
    }
};
