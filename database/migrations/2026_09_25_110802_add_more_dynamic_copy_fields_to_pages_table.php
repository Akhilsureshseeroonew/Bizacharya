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
            $table->json('hero_stats')->nullable()->after('mission_text');
            $table->json('vm_words')->nullable()->after('hero_stats');
            $table->string('news_heading')->nullable()->after('vm_words');

            // About page
            $table->json('hero_badges')->nullable()->after('leader_badges');
            $table->json('accent_words')->nullable()->after('hero_badges');
            $table->string('know_badge')->nullable()->after('accent_words');
            $table->json('cta_chain')->nullable()->after('know_badge');

            // Contact page
            $table->json('facts_heading')->nullable()->after('cta_chain');
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['hero_stats', 'vm_words', 'news_heading', 'hero_badges', 'accent_words', 'know_badge', 'cta_chain', 'facts_heading']);
        });
    }
};
