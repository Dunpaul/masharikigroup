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
        Schema::table('academy_form_submissions', function (Blueprint $table) {
            $table->foreignId('academy_cohort_id')->nullable()->after('id')->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academy_form_submissions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('academy_cohort_id');
        });
    }
};
