<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Every section heading/eyebrow/intro on the homepage used to be hardcoded
 * text in resources/views/pages/home.blade.php. This adds admin-editable
 * columns for that copy and seeds them with the exact text that was already
 * live, so the page renders identically until someone edits a field.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('hero_subtitle')->nullable()->after('hero_lead');
            $table->string('hero_cta_label')->nullable()->after('hero_subtitle');
            $table->string('hero_cta2_label')->nullable()->after('hero_cta_label');

            $table->string('events_eyebrow')->nullable()->after('news_heading');
            $table->text('events_intro')->nullable()->after('events_eyebrow');

            $table->string('journey_eyebrow')->nullable()->after('events_intro');
            $table->string('journey_heading')->nullable()->after('journey_eyebrow');
            $table->text('journey_intro')->nullable()->after('journey_heading');

            $table->string('sectors_eyebrow')->nullable()->after('journey_intro');
            $table->string('sectors_heading')->nullable()->after('sectors_eyebrow');
            $table->text('sectors_intro')->nullable()->after('sectors_heading');

            $table->string('services_eyebrow')->nullable()->after('sectors_intro');
            $table->string('services_heading')->nullable()->after('services_eyebrow');
            $table->text('services_intro')->nullable()->after('services_heading');
            $table->string('services_cta_label')->nullable()->after('services_intro');

            $table->string('vm_eyebrow')->nullable()->after('services_cta_label');
            $table->string('vm_heading')->nullable()->after('vm_eyebrow');

            $table->string('stories_eyebrow')->nullable()->after('vm_heading');
            $table->string('stories_heading')->nullable()->after('stories_eyebrow');
            $table->text('stories_intro')->nullable()->after('stories_heading');

            $table->string('strip_cta_lead')->nullable()->after('stories_intro');

            $table->string('news_eyebrow')->nullable()->after('strip_cta_lead');
            $table->text('news_intro')->nullable()->after('news_eyebrow');

            $table->string('connect_eyebrow')->nullable()->after('news_intro');
            $table->string('connect_heading')->nullable()->after('connect_eyebrow');
            $table->text('connect_intro')->nullable()->after('connect_heading');
            $table->string('connect_aside_heading')->nullable()->after('connect_intro');
            $table->text('connect_aside_intro')->nullable()->after('connect_aside_heading');
        });

        DB::table('pages')->where('slug', 'home')->update([
            'hero_subtitle' => 'Business Consulting & Startup Support Across Kerala',
            'hero_cta_label' => 'Start Your Entrepreneurial Journey',
            'hero_cta2_label' => 'Book a Consultation',

            'events_eyebrow' => 'Upcoming Events',
            'events_intro' => 'Join our upcoming events, workshops and sessions designed to help you learn, connect and grow.',

            'journey_eyebrow' => 'The Bizacharya Journey',
            'journey_heading' => 'Your Entrepreneurship Journey with Bizacharya',
            'journey_intro' => 'Six guided stages that take you from a first idea to a registered, funded and growing business.',

            'sectors_eyebrow' => 'What we support',
            'sectors_heading' => 'Sectors We Support',
            'sectors_intro' => 'Guidance for the sectors where entrepreneurs across Kerala are building businesses today.',

            'services_eyebrow' => 'What we offer',
            'services_heading' => 'Services We Offer',
            'services_intro' => 'Practical, end-to-end support for every stage of your business.',
            'services_cta_label' => 'Speak With an Advisor',

            'vm_eyebrow' => 'The Bizacharya',
            'vm_heading' => 'Our Mission &amp; <span class="vm2-accent">Vision</span>',

            'stories_eyebrow' => 'Success Stories',
            'stories_heading' => 'Entrepreneurs<br>We Empowered',
            'stories_intro' => 'Real journeys of entrepreneurs across Kerala who started, registered, funded and grew their businesses with Bizacharya.',

            'strip_cta_lead' => "Let's discuss your business idea",

            'news_eyebrow' => 'News & Events',
            'news_intro' => 'Upcoming events, webinars, workshops and membership benefits for entrepreneurs across Kerala.',

            'connect_eyebrow' => 'Enquiry',
            'connect_heading' => 'Connect with Bizacharya',
            'connect_intro' => 'Tell us about your idea or business and a Bizacharya advisor will get in touch.',
            'connect_aside_heading' => 'Talk to us directly',
            'connect_aside_intro' => 'Prefer a conversation? Call, email or start a WhatsApp chat with our team.',
        ]);
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'hero_subtitle', 'hero_cta_label', 'hero_cta2_label',
                'events_eyebrow', 'events_intro',
                'journey_eyebrow', 'journey_heading', 'journey_intro',
                'sectors_eyebrow', 'sectors_heading', 'sectors_intro',
                'services_eyebrow', 'services_heading', 'services_intro', 'services_cta_label',
                'vm_eyebrow', 'vm_heading',
                'stories_eyebrow', 'stories_heading', 'stories_intro',
                'strip_cta_lead',
                'news_eyebrow', 'news_intro',
                'connect_eyebrow', 'connect_heading', 'connect_intro',
                'connect_aside_heading', 'connect_aside_intro',
            ]);
        });
    }
};
