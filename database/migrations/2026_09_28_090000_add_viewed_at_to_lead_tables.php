<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected array $tablesWithStatus = ['enquiries', 'job_applications', 'associates'];

    public function up(): void
    {
        foreach ($this->tablesWithStatus as $table) {
            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->timestamp('viewed_at')->nullable()->after('status');
            });
        }

        Schema::table('event_registrations', function (Blueprint $blueprint) {
            $blueprint->timestamp('viewed_at')->nullable()->after('user_agent');
        });
    }

    public function down(): void
    {
        foreach ([...$this->tablesWithStatus, 'event_registrations'] as $table) {
            Schema::table($table, function (Blueprint $blueprint) {
                $blueprint->dropColumn('viewed_at');
            });
        }
    }
};
