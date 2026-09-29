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

    /**
     * Only show/validate/save fields tagged for this page's own slug (or fields
     * with no 'page' tag, which apply everywhere). Critical: rules()/fill() route
     * through this too, not just the form — a field the form never rendered must
     * never be treated as "submitted empty" and overwritten with null.
     */
    protected function visibleFields($item): array
    {
        return array_values(array_filter($this->fields, function ($field) use ($item) {
            return empty($field['page']) || ($item->slug ?? null) === $field['page'];
        }));
    }

    protected array $fields = [
        // Shown for every page (Home, About, Contact, and any page you create).
        ['name' => 'slug', 'label' => 'Web address', 'type' => 'text', 'required' => true, 'section' => 'Basics', 'help' => 'Lowercase letters, numbers and dashes only, e.g. privacy-policy → shown at yoursite.com/privacy-policy. Fixed for Home/About/Contact.'],
        ['name' => 'title', 'label' => 'Page title', 'type' => 'text', 'required' => true, 'section' => 'Basics'],
        ['name' => 'menu_label', 'label' => 'Menu label (optional — only if this text should differ from the Page title above)', 'type' => 'text', 'section' => 'Basics'],
        ['name' => 'hero_eyebrow', 'label' => 'Small label above the heading (optional)', 'type' => 'text', 'section' => 'Top Banner'],
        ['name' => 'hero_heading', 'label' => 'Main heading', 'type' => 'text', 'section' => 'Top Banner'],
        ['name' => 'hero_lead', 'label' => 'Intro line under the heading', 'type' => 'textarea', 'section' => 'Top Banner'],
        ['name' => 'body', 'label' => 'Main content', 'type' => 'richtext', 'section' => 'Main Content'],
        ['name' => 'seo_title', 'label' => 'Google search result title (optional)', 'type' => 'text', 'section' => 'Search Engines (SEO)'],
        ['name' => 'seo_description', 'label' => 'Google search result description (optional)', 'type' => 'textarea', 'section' => 'Search Engines (SEO)'],
        ['name' => 'is_published', 'label' => 'Visible on the live site', 'type' => 'checkbox', 'section' => 'Visibility'],

        // Home page only.
        ['name' => 'hero_subtitle', 'label' => 'Small line under the heading', 'type' => 'text', 'page' => 'home', 'section' => 'Top Banner'],
        ['name' => 'hero_cta_label', 'label' => 'Main button text', 'type' => 'text', 'page' => 'home', 'section' => 'Top Banner'],
        ['name' => 'hero_cta2_label', 'label' => '"Call us" button text', 'type' => 'text', 'page' => 'home', 'section' => 'Top Banner'],
        ['name' => 'hero_stats', 'label' => 'The 4 number badges over the banner image', 'type' => 'pairs', 'page' => 'home', 'section' => 'Top Banner', 'max' => 4, 'help' => 'e.g. "Guiding" / "Entrepreneurs"'],

        ['name' => 'events_eyebrow', 'label' => 'Small label', 'type' => 'text', 'page' => 'home', 'section' => 'Upcoming Events (near the top)'],
        ['name' => 'events_heading', 'label' => 'Heading', 'type' => 'text', 'page' => 'home', 'section' => 'Upcoming Events (near the top)'],
        ['name' => 'events_intro', 'label' => 'Intro line', 'type' => 'textarea', 'page' => 'home', 'section' => 'Upcoming Events (near the top)'],

        ['name' => 'journey_eyebrow', 'label' => 'Small label', 'type' => 'text', 'page' => 'home', 'section' => 'Your Journey (6-step roadmap)'],
        ['name' => 'journey_heading', 'label' => 'Heading', 'type' => 'text', 'page' => 'home', 'section' => 'Your Journey (6-step roadmap)'],
        ['name' => 'journey_intro', 'label' => 'Intro line', 'type' => 'textarea', 'page' => 'home', 'section' => 'Your Journey (6-step roadmap)'],
        ['name' => 'journey_steps', 'label' => 'The 6 steps', 'type' => 'fixed-pairs', 'count' => 6, 'page' => 'home', 'section' => 'Your Journey (6-step roadmap)', 'help' => 'Fill in a Title + Description for all 6, or leave all 6 blank to hide this section — the graphic is a fixed 6-step layout.'],

        ['name' => 'sectors_eyebrow', 'label' => 'Small label', 'type' => 'text', 'page' => 'home', 'section' => 'Sectors We Support'],
        ['name' => 'sectors_heading', 'label' => 'Heading', 'type' => 'text', 'page' => 'home', 'section' => 'Sectors We Support'],
        ['name' => 'sectors_intro', 'label' => 'Intro line', 'type' => 'textarea', 'page' => 'home', 'section' => 'Sectors We Support'],

        ['name' => 'services_eyebrow', 'label' => 'Small label', 'type' => 'text', 'page' => 'home', 'section' => 'Services We Offer'],
        ['name' => 'services_heading', 'label' => 'Heading', 'type' => 'text', 'page' => 'home', 'section' => 'Services We Offer'],
        ['name' => 'services_intro', 'label' => 'Intro line', 'type' => 'textarea', 'page' => 'home', 'section' => 'Services We Offer'],
        ['name' => 'services_cta_label', 'label' => '"Speak with an advisor" button text (used here and further down the page)', 'type' => 'text', 'page' => 'home', 'section' => 'Services We Offer'],

        ['name' => 'vm_eyebrow', 'label' => 'Small label', 'type' => 'text', 'page' => 'home', 'section' => 'Vision & Mission'],
        ['name' => 'vm_heading', 'label' => 'Heading', 'type' => 'text', 'page' => 'home', 'section' => 'Vision & Mission'],
        ['name' => 'vision_text', 'label' => 'Vision paragraph', 'type' => 'textarea', 'page' => 'home', 'section' => 'Vision & Mission'],
        ['name' => 'mission_text', 'label' => 'Mission paragraph', 'type' => 'textarea', 'page' => 'home', 'section' => 'Vision & Mission'],
        ['name' => 'vm_words', 'label' => 'The 3 words in the centre of the graphic', 'type' => 'list', 'page' => 'home', 'section' => 'Vision & Mission', 'max' => 3, 'help' => 'e.g. People, Business, A Stronger Kerala'],

        ['name' => 'stories_eyebrow', 'label' => 'Small label', 'type' => 'text', 'page' => 'home', 'section' => 'Success Stories'],
        ['name' => 'stories_heading', 'label' => 'Heading', 'type' => 'text', 'page' => 'home', 'section' => 'Success Stories'],
        ['name' => 'stories_intro', 'label' => 'Intro line', 'type' => 'textarea', 'page' => 'home', 'section' => 'Success Stories'],

        ['name' => 'strip_cta_lead', 'label' => 'Headline text', 'type' => 'text', 'page' => 'home', 'section' => '"Let\'s Discuss Your Business Idea" banner'],

        ['name' => 'news_eyebrow', 'label' => 'Small label', 'type' => 'text', 'page' => 'home', 'section' => 'News & Events (near the bottom)'],
        ['name' => 'news_heading', 'label' => 'Heading', 'type' => 'text', 'page' => 'home', 'section' => 'News & Events (near the bottom)'],
        ['name' => 'news_intro', 'label' => 'Intro line', 'type' => 'textarea', 'page' => 'home', 'section' => 'News & Events (near the bottom)'],

        ['name' => 'connect_eyebrow', 'label' => 'Small label', 'type' => 'text', 'page' => 'home', 'section' => 'Enquiry Form (bottom of page)'],
        ['name' => 'connect_heading', 'label' => 'Heading', 'type' => 'text', 'page' => 'home', 'section' => 'Enquiry Form (bottom of page)'],
        ['name' => 'connect_intro', 'label' => 'Intro line', 'type' => 'textarea', 'page' => 'home', 'section' => 'Enquiry Form (bottom of page)'],
        ['name' => 'connect_aside_heading', 'label' => 'Side panel heading', 'type' => 'text', 'page' => 'home', 'section' => 'Enquiry Form (bottom of page)'],
        ['name' => 'connect_aside_intro', 'label' => 'Side panel intro line', 'type' => 'textarea', 'page' => 'home', 'section' => 'Enquiry Form (bottom of page)'],

        // About page only.
        ['name' => 'know_badge', 'label' => 'Small badge text over the team photo', 'type' => 'text', 'page' => 'about', 'section' => 'Top Banner'],
        ['name' => 'hero_badges', 'label' => 'The 2 floating badges beside the photo', 'type' => 'list', 'page' => 'about', 'section' => 'Top Banner', 'max' => 2, 'help' => 'e.g. 54+ Financial Institutions'],
        ['name' => 'accent_words', 'label' => 'The 3 words under the heading', 'type' => 'list', 'page' => 'about', 'section' => 'Top Banner', 'max' => 3, 'help' => 'e.g. Strategy, People, Growth'],
        ['name' => 'timeline', 'label' => 'Milestones (title + description each)', 'type' => 'pairs', 'page' => 'about', 'section' => 'Our Journey Timeline', 'help' => 'e.g. "17+ Years" / "Business Consulting & Advisory Experience"'],
        ['name' => 'audience', 'label' => 'Who we help (one per line)', 'type' => 'list', 'page' => 'about', 'section' => '"Today, We Empower" List'],
        ['name' => 'expertise', 'label' => 'Expertise areas (one per line)', 'type' => 'list', 'page' => 'about', 'section' => '"Our Expertise" Grid'],
        ['name' => 'leader_initials', 'label' => 'Initials shown on the avatar', 'type' => 'text', 'page' => 'about', 'section' => 'Leadership Profile', 'help' => 'Leave the whole Leadership Profile section blank to hide it.'],
        ['name' => 'leader_name', 'label' => 'Name', 'type' => 'text', 'page' => 'about', 'section' => 'Leadership Profile'],
        ['name' => 'leader_title', 'label' => 'Title (short, e.g. "Managing Director")', 'type' => 'text', 'page' => 'about', 'section' => 'Leadership Profile'],
        ['name' => 'leader_role', 'label' => 'Title (full, e.g. "Managing Director, Bizacharya Consulting Pvt. Ltd.")', 'type' => 'text', 'page' => 'about', 'section' => 'Leadership Profile'],
        ['name' => 'leader_bio', 'label' => 'Biography', 'type' => 'richtext', 'page' => 'about', 'section' => 'Leadership Profile'],
        ['name' => 'leader_badges', 'label' => 'Credential badges (one per line)', 'type' => 'list', 'page' => 'about', 'section' => 'Leadership Profile'],
        ['name' => 'cta_chain', 'label' => 'Steps shown in the closing banner (one per line)', 'type' => 'list', 'page' => 'about', 'section' => 'Closing Banner', 'help' => 'e.g. Idea Validation, Business Registration, Funding, Compliance, Expansion, Long-Term Growth'],

        // Contact page only.
        ['name' => 'facts_heading', 'label' => 'Heading (title + accent word)', 'type' => 'pairs', 'page' => 'contact', 'section' => 'Contact Details Heading', 'help' => 'e.g. "We\'d Love to" / "Hear From You"'],
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

        $rules['journey_steps'] = ['nullable', 'array', function ($attribute, $value, $fail) {
            $filled = collect($value ?? [])
                ->filter(fn ($row) => trim($row['value'] ?? '') !== '' && trim($row['text'] ?? '') !== '')
                ->count();

            if ($filled > 0 && $filled !== 6) {
                $fail('All 6 "Your Journey" steps need both a Title and a Description filled in — or leave all 6 blank to hide the section.');
            }
        }];

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
