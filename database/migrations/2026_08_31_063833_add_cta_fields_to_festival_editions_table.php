<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The festival is free — no tickets, no reservations. This phase field
     * only ever switches the homepage/nav CTA between "Submit Your Film"
     * (call-for-entries open) and "Plan Your Visit" (an informational page
     * once the program is published) — nothing here builds or implies a
     * booking/RSVP flow.
     */
    public function up(): void
    {
        Schema::table('festival_editions', function (Blueprint $table) {
            $table->string('cta_phase')->default('submissions')->after('status'); // submissions | program_published
            $table->string('cta_label_override')->nullable()->after('cta_phase');
            $table->string('cta_url_override')->nullable()->after('cta_label_override');
        });
    }

    public function down(): void
    {
        Schema::table('festival_editions', function (Blueprint $table) {
            $table->dropColumn(['cta_phase', 'cta_label_override', 'cta_url_override']);
        });
    }
};
