<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected const TABLES = ['exhibitors', 'non_exhibitors', 'virtual_attendants'];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->decimal('amount', 10, 2)->nullable();
                $blueprint->string('currency', 3)->nullable();
                $blueprint->string('payment_reference')->nullable()->unique();
                $blueprint->string('flutterwave_transaction_id')->nullable();
                $blueprint->timestamp('paid_at')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->dropColumn(['amount', 'currency', 'payment_reference', 'flutterwave_transaction_id', 'paid_at']);
            });
        }
    }
};
