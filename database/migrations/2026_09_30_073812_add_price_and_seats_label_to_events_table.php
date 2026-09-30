<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * The event detail page's sticky sidebar card shows a price/seats line
 * (e.g. "Free · limited seats") that was hardcoded as literal "Basic · limited
 * seats" text in the Blade view — no admin control at all. This adds two
 * fields for it and backfills existing events with that exact previous text,
 * so nothing on the live site changes until someone edits it.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('price_label')->nullable()->after('organizer');
            $table->string('seats_label')->nullable()->after('price_label');
        });

        DB::table('events')->update([
            'price_label' => 'Basic',
            'seats_label' => 'limited seats',
        ]);
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['price_label', 'seats_label']);
        });
    }
};
