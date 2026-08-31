<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('affiliated_with_norxen')->nullable();
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('id_number');
            $table->string('gender')->nullable();
            $table->string('specialization');
            $table->string('education_level');
            $table->string('institution');
            $table->integer('year_completed');
            $table->string('has_experience');
            $table->text('experience_description')->nullable();
            $table->text('motivation');
            $table->boolean('commitment');
            $table->string('declaration_name');
            $table->date('declaration_date');
            $table->boolean('declaration_agree');
            $table->json('portfolio_files')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('submitted_at')->useCurrent();
            $table->boolean('email_sent_success')->default(false);
            $table->text('email_error')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
