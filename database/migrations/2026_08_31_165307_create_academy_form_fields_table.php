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
        Schema::create('academy_form_fields', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('label');
            $table->string('type')->default('text'); // text, email, tel, textarea, select, radio, checkbox, date, file
            $table->json('options')->nullable(); // for select/radio: list of option labels
            $table->boolean('multiple')->default(false); // for select (multi-select) / file (multiple uploads)
            $table->boolean('required')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            // Marks the small set of fields the submissions table indexes for
            // filtering/export (full_name, email, program). Admins can still
            // relabel these, but they can't be deleted or retyped away from
            // the panel since the submission record depends on them existing.
            $table->string('system_key')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academy_form_fields');
    }
};
