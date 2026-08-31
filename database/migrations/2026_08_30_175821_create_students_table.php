<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id')->unique();

            $table->string('company_contact_first_name');
            $table->string('company_contact_last_name');
            $table->string('company_contact_phone');
            $table->string('company_contact_email')->unique();
            $table->string('designation');
            $table->string('attending_as');

            $table->string('school_name');
            $table->string('school_address');
            $table->string('school_phone');
            $table->string('school_email');
            $table->string('school_website');

            $table->string('password');
            $table->string('payment_status')->default('paid');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
