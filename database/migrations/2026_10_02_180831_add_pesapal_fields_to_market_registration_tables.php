<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Masharket payments moved from Flutterwave to Pesapal (Rwanda). The old
 * `flutterwave_transaction_id` column is left in place — it's historical
 * record for any transactions already processed through it, not dead
 * weight to clean up — new payments are tracked via
 * `pesapal_order_tracking_id` instead, Pesapal's own GUID for an order,
 * used to re-check status via GetTransactionStatus.
 */
return new class extends Migration
{
    protected const TABLES = ['exhibitors', 'non_exhibitors', 'virtual_attendants'];

    public function up(): void
    {
        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->string('pesapal_order_tracking_id')->nullable();
            });
        }
    }

    public function down(): void
    {
        foreach (self::TABLES as $table) {
            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->dropColumn('pesapal_order_tracking_id');
            });
        }
    }
};