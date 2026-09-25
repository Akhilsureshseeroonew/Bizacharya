<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->enum('registration_mode', ['internal', 'external'])->default('internal')->after('registration_open');
            $table->string('external_registration_url')->nullable()->after('registration_mode');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['registration_mode', 'external_registration_url']);
        });
    }
};
