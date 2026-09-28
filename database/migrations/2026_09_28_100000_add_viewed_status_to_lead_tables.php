<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE enquiries MODIFY status ENUM('new','viewed','contacted','closed') NOT NULL DEFAULT 'new'");
        DB::statement("ALTER TABLE job_applications MODIFY status ENUM('new','viewed','reviewing','shortlisted','rejected','hired') NOT NULL DEFAULT 'new'");
        DB::statement("ALTER TABLE associates MODIFY status ENUM('new','viewed','contacted','approved','rejected') NOT NULL DEFAULT 'new'");
    }

    public function down(): void
    {
        DB::statement("UPDATE enquiries SET status = 'new' WHERE status = 'viewed'");
        DB::statement("UPDATE job_applications SET status = 'new' WHERE status = 'viewed'");
        DB::statement("UPDATE associates SET status = 'new' WHERE status = 'viewed'");

        DB::statement("ALTER TABLE enquiries MODIFY status ENUM('new','contacted','closed') NOT NULL DEFAULT 'new'");
        DB::statement("ALTER TABLE job_applications MODIFY status ENUM('new','reviewing','shortlisted','rejected','hired') NOT NULL DEFAULT 'new'");
        DB::statement("ALTER TABLE associates MODIFY status ENUM('new','contacted','approved','rejected') NOT NULL DEFAULT 'new'");
    }
};
