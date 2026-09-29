<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Home/About/Contact are 3 fixed, hand-designed rows (template = 'home' /
 * 'about' / 'contact', each with its own bespoke Blade view) — they can be
 * edited but never deleted or re-slugged here. Any other row is a generic,
 * fully admin-created page (template = 'standard', the column default),
 * rendered by resources/views/pages/generic.blade.php at GET /{slug}
 * (see the catch-all route at the bottom of routes/web.php).
 */
class PageAdminController extends ResourceController
{
    protected string $model = Page::class;

    protected string $routeBase = 'admin.pages';

    protected string $title = 'Page';

    protected string $pluralTitle = 'Pages';

    protected string $orderBy = 'slug';

    protected array $columns = ['slug', 'title', 'is_published'];

    protected const CORE_SLUGS = ['home', 'about', 'contact'];

    /** Top-level URL segments already used by real routes — a generic page can't take one of these. */
    protected const RESERVED_SLUGS = [
        'home', 'about', 'contact', 'opportunities', 'services', 'success-stories',
        'community', 'careers', 'learning-hub', 'learning', 'login', 'signup', 'portal',
        'sitemap.xml', 'sitemap', 'enquiry', 'associates', 'bizacharya-admin', 'storage', 'assets',
    ];

    protected array $fields = [
        ['name' => 'slug', 'label' => 'URL slug', 'type' => 'text', 'required' => true, 'help' => 'Lowercase letters, numbers and dashes only, e.g. privacy-policy → shown at /privacy-policy. Locked for Home/About/Contact.'],
        ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
        ['name' => 'menu_label', 'label' => 'Menu label (optional)', 'type' => 'text'],
        ['name' => 'hero_eyebrow', 'label' => 'Hero eyebrow (optional)', 'type' => 'text'],
        ['name' => 'hero_heading', 'label' => 'Hero heading (HTML allowed)', 'type' => 'text'],
        ['name' => 'hero_lead', 'label' => 'Hero intro line', 'type' => 'textarea'],
        ['name' => 'body', 'label' => 'Body (HTML)', 'type' => 'richtext'],

        ['name' => 'hero_subtitle', 'label' => '[Home only] Hero subtitle (small line under the H1)', 'type' => 'text'],
        ['name' => 'hero_cta_label', 'label' => '[Home only] Hero primary button label', 'type' => 'text'],
        ['name' => 'hero_cta2_label', 'label' => '[Home only] Hero secondary (call) button label', 'type' => 'text'],
        ['name' => 'journey_steps', 'label' => '[Home only] "Your Journey" steps — one per line as "Title | Description"', 'type' => 'pairs', 'help' => 'e.g. "Discover | Identify strengths and business opportunities."'],
        ['name' => 'vision_text', 'label' => '[Home only] Vision statement', 'type' => 'textarea'],
        ['name' => 'mission_text', 'label' => '[Home only] Mission statement', 'type' => 'textarea'],
        ['name' => 'hero_stats', 'label' => '[Home only] Hero stat badges — one per line as "Line 1 | Line 2"', 'type' => 'pairs', 'help' => 'Exactly 4, e.g. "Guiding | Entrepreneurs"'],
        ['name' => 'vm_words', 'label' => '[Home only] Vision/Mission graphic centre words (one per line)', 'type' => 'list', 'help' => 'Exactly 3, e.g. People / Business / A Stronger Kerala'],

        ['name' => 'events_eyebrow', 'label' => '[Home only] "Upcoming Events" section eyebrow', 'type' => 'text'],
        ['name' => 'events_heading', 'label' => '[Home only] "Upcoming Events" section heading', 'type' => 'text'],
        ['name' => 'events_intro', 'label' => '[Home only] "Upcoming Events" section intro', 'type' => 'textarea'],

        ['name' => 'journey_eyebrow', 'label' => '[Home only] "Your Journey" section eyebrow', 'type' => 'text'],
        ['name' => 'journey_heading', 'label' => '[Home only] "Your Journey" section heading', 'type' => 'text'],
        ['name' => 'journey_intro', 'label' => '[Home only] "Your Journey" section intro', 'type' => 'textarea'],

        ['name' => 'sectors_eyebrow', 'label' => '[Home only] "Sectors" section eyebrow', 'type' => 'text'],
        ['name' => 'sectors_heading', 'label' => '[Home only] "Sectors" section heading', 'type' => 'text'],
        ['name' => 'sectors_intro', 'label' => '[Home only] "Sectors" section intro', 'type' => 'textarea'],

        ['name' => 'services_eyebrow', 'label' => '[Home only] "Services" section eyebrow', 'type' => 'text'],
        ['name' => 'services_heading', 'label' => '[Home only] "Services" section heading', 'type' => 'text'],
        ['name' => 'services_intro', 'label' => '[Home only] "Services" section intro', 'type' => 'textarea'],
        ['name' => 'services_cta_label', 'label' => '[Home only] "Speak With an Advisor" button label (reused in the Services and closing CTA sections)', 'type' => 'text'],

        ['name' => 'vm_eyebrow', 'label' => '[Home only] "Vision & Mission" section eyebrow', 'type' => 'text'],
        ['name' => 'vm_heading', 'label' => '[Home only] "Vision & Mission" section heading (HTML allowed)', 'type' => 'text'],

        ['name' => 'stories_eyebrow', 'label' => '[Home only] "Success Stories" section eyebrow', 'type' => 'text'],
        ['name' => 'stories_heading', 'label' => '[Home only] "Success Stories" section heading (HTML allowed)', 'type' => 'text'],
        ['name' => 'stories_intro', 'label' => '[Home only] "Success Stories" section intro', 'type' => 'textarea'],

        ['name' => 'strip_cta_lead', 'label' => '[Home only] Closing CTA band headline', 'type' => 'text'],

        ['name' => 'news_eyebrow', 'label' => '[Home only] "News & Events" section eyebrow', 'type' => 'text'],
        ['name' => 'news_heading', 'label' => '[Home only] "News & Events" section heading', 'type' => 'text'],
        ['name' => 'news_intro', 'label' => '[Home only] "News & Events" section intro', 'type' => 'textarea'],

        ['name' => 'connect_eyebrow', 'label' => '[Home only] "Connect" (enquiry) section eyebrow', 'type' => 'text'],
        ['name' => 'connect_heading', 'label' => '[Home only] "Connect" section heading', 'type' => 'text'],
        ['name' => 'connect_intro', 'label' => '[Home only] "Connect" section intro', 'type' => 'textarea'],
        ['name' => 'connect_aside_heading', 'label' => '[Home only] "Connect" side panel heading', 'type' => 'text'],
        ['name' => 'connect_aside_intro', 'label' => '[Home only] "Connect" side panel intro', 'type' => 'textarea'],

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

    protected function rules($item = null): array
    {
        $rules = parent::rules($item);

        $rules['slug'] = [
            'required', 'string', 'max:191', 'alpha_dash',
            Rule::unique('pages', 'slug')->ignore($item?->id),
        ];

        if (! $item || ! in_array($item->slug, self::CORE_SLUGS, true)) {
            $rules['slug'][] = Rule::notIn(self::RESERVED_SLUGS);
        }

        return $rules;
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $item = new Page(['template' => 'standard']);
        $this->fill($item, $request);
        $item->save();

        return redirect()->route('admin.pages.index')->with('status', 'Page created.');
    }

    public function update(Request $request, $id)
    {
        $item = Page::findOrFail($id);

        $request->validate($this->rules($item));

        $isCore = in_array($item->slug, self::CORE_SLUGS, true);
        if ($isCore) {
            $request->merge(['slug' => $item->slug]);
        }

        $this->fill($item, $request);
        $item->save();

        return redirect()->route('admin.pages.index')->with('status', 'Page updated.');
    }

    public function destroy($id)
    {
        $item = Page::findOrFail($id);

        abort_if(in_array($item->slug, self::CORE_SLUGS, true), 403, 'Home, About, and Contact cannot be deleted — they have dedicated code behind them.');

        $item->delete();

        return redirect()->route('admin.pages.index')->with('status', 'Page deleted.');
    }
}
