<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;

/**
 * Only 3 fixed rows exist (home/about/contact) — routes only register
 * index/edit/update (see routes/web.php), no create/destroy.
 */
class PageAdminController extends ResourceController
{
    protected string $model = Page::class;

    protected string $routeBase = 'admin.pages';

    protected string $title = 'Page';

    protected string $pluralTitle = 'Pages';

    protected string $orderBy = 'slug';

    protected array $columns = ['slug', 'title', 'is_published'];

    protected array $fields = [
        ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
        ['name' => 'menu_label', 'label' => 'Menu label (optional)', 'type' => 'text'],
        ['name' => 'hero_eyebrow', 'label' => 'Hero eyebrow (optional)', 'type' => 'text'],
        ['name' => 'hero_heading', 'label' => 'Hero heading (HTML allowed)', 'type' => 'text'],
        ['name' => 'hero_lead', 'label' => 'Hero intro line', 'type' => 'textarea'],
        ['name' => 'body', 'label' => 'Body (HTML)', 'type' => 'richtext'],

        ['name' => 'journey_steps', 'label' => '[Home only] "Your Journey" steps — one per line as "Title | Description"', 'type' => 'pairs', 'help' => 'e.g. "Discover | Identify strengths and business opportunities."'],
        ['name' => 'vision_text', 'label' => '[Home only] Vision statement', 'type' => 'textarea'],
        ['name' => 'mission_text', 'label' => '[Home only] Mission statement', 'type' => 'textarea'],
        ['name' => 'hero_stats', 'label' => '[Home only] Hero stat badges — one per line as "Line 1 | Line 2"', 'type' => 'pairs', 'help' => 'Exactly 4, e.g. "Guiding | Entrepreneurs"'],
        ['name' => 'vm_words', 'label' => '[Home only] Vision/Mission graphic centre words (one per line)', 'type' => 'list', 'help' => 'Exactly 3, e.g. People / Business / A Stronger Kerala'],
        ['name' => 'news_heading', 'label' => '[Home only] "News & Events" section heading', 'type' => 'text'],

        ['name' => 'timeline', 'label' => '[About only] "Our Journey" timeline — one per line as "Value | Description"', 'type' => 'pairs', 'help' => 'e.g. "17+ Years | Business Consulting & Advisory Experience"'],
        ['name' => 'audience', 'label' => '[About only] "Today, we empower" list (one per line)', 'type' => 'list'],
        ['name' => 'expertise', 'label' => '[About only] "Our Expertise" list (one per line)', 'type' => 'list'],
        ['name' => 'leader_initials', 'label' => '[About only] Leader initials (avatar)', 'type' => 'text'],
        ['name' => 'leader_name', 'label' => '[About only] Leader name', 'type' => 'text'],
        ['name' => 'leader_title', 'label' => '[About only] Leader title (short, e.g. "Managing Director")', 'type' => 'text'],
        ['name' => 'leader_role', 'label' => '[About only] Leader role (full, e.g. "Managing Director, Bizacharya Consulting Pvt. Ltd.")', 'type' => 'text'],
        ['name' => 'leader_bio', 'label' => '[About only] Leader bio (HTML paragraphs)', 'type' => 'richtext'],
        ['name' => 'leader_badges', 'label' => '[About only] Leader credential badges (one per line)', 'type' => 'list'],
        ['name' => 'hero_badges', 'label' => '[About only] Hero stat badges (one per line)', 'type' => 'list', 'help' => 'Exactly 2, e.g. "54+ Financial Institutions"'],
        ['name' => 'accent_words', 'label' => '[About only] Hero accent words (one per line)', 'type' => 'list', 'help' => 'Exactly 3, e.g. Strategy / People / Growth'],
        ['name' => 'know_badge', 'label' => '[About only] "Beyond Corporate Advisory" badge text', 'type' => 'text'],
        ['name' => 'cta_chain', 'label' => '[About only] Closing CTA chain steps (one per line)', 'type' => 'list', 'help' => 'e.g. Idea Validation, Business Registration, Funding, Compliance, Expansion, Long-Term Growth'],

        ['name' => 'facts_heading', 'label' => '[Contact only] "Contact Details" section heading — as "Line 1 | Line 2"', 'type' => 'pairs', 'help' => 'e.g. "We\'d Love to | Hear From You"'],

        ['name' => 'seo_title', 'label' => 'SEO title (optional)', 'type' => 'text'],
        ['name' => 'seo_description', 'label' => 'SEO description (optional)', 'type' => 'textarea'],
        ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
    ];
}
