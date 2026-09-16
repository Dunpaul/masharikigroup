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
        Schema::table('market_settings', function (Blueprint $blueprint) {
            $blueprint->decimal('exhibitor_fee', 10, 2)->default(50.00);
            $blueprint->decimal('non_exhibitor_fee', 10, 2)->default(30.00);
            $blueprint->decimal('virtual_attendant_fee', 10, 2)->default(15.00);
            $blueprint->string('fee_currency', 3)->default('RWF');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('market_settings', function (Blueprint $blueprint) {
            $blueprint->dropColumn(['exhibitor_fee', 'non_exhibitor_fee', 'virtual_attendant_fee', 'fee_currency']);
        });
    }
};
