<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Home page
            $table->json('journey_steps')->nullable()->after('sections');
            $table->text('vision_text')->nullable()->after('journey_steps');
            $table->text('mission_text')->nullable()->after('vision_text');

            // About page
            $table->json('timeline')->nullable()->after('mission_text');
            $table->json('audience')->nullable()->after('timeline');
            $table->json('expertise')->nullable()->after('audience');
            $table->string('leader_initials')->nullable()->after('expertise');
            $table->string('leader_name')->nullable()->after('leader_initials');
            $table->string('leader_title')->nullable()->after('leader_name');
            $table->string('leader_role')->nullable()->after('leader_title');
            $table->longText('leader_bio')->nullable()->after('leader_role');
            $table->json('leader_badges')->nullable()->after('leader_bio');

            $table->dropColumn('sections');
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->json('sections')->nullable();

            $table->dropColumn([
                'journey_steps', 'vision_text', 'mission_text',
                'timeline', 'audience', 'expertise',
                'leader_initials', 'leader_name', 'leader_title', 'leader_role', 'leader_bio', 'leader_badges',
            ]);
        });
    }
};
