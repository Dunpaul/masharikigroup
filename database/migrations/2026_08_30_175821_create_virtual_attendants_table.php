<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('virtual_attendants', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id')->unique();

            $table->string('company_contact_first_name');
            $table->string('company_contact_last_name');
            $table->string('company_contact_phone');
            $table->string('company_contact_email')->unique();
            $table->string('designation');
            $table->string('attending_as');

            $table->string('company_contact_alt_first_name')->nullable();
            $table->string('company_contact_alt_last_name')->nullable();
            $table->string('company_contact_alt_phone')->nullable();
            $table->string('company_contact_alt_email')->nullable();

            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_phone');
            $table->string('company_email');
            $table->string('company_website');
            $table->string('company_services');
            $table->text('company_services_exhibited');
            $table->json('company_provisions')->nullable();
            $table->json('company_products')->nullable();
            $table->text('company_products_other')->nullable();

            $table->string('password');
            $table->string('payment_status')->default('unpaid');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('virtual_attendants');
    }
};
