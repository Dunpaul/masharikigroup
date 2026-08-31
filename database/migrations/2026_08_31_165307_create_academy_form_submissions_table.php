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
        Schema::create('academy_form_submissions', function (Blueprint $table) {
            $table->id();
            // Queryable/exportable columns, kept in sync from whichever
            // fields are flagged system_key => full_name/email/program.
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('program')->nullable();
            // Every other dynamic field's answer, keyed by field `key`.
            $table->json('answers')->nullable();
            $table->json('portfolio_files')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();

            $table->index(['email']);
            $table->index(['program']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academy_form_submissions');
    }
};
