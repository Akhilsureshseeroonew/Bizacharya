<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sector;

class SectorAdminController extends ResourceController
{
    protected string $model = Sector::class;

    protected string $routeBase = 'admin.sectors';

    protected string $title = 'Sector';

    protected string $pluralTitle = 'Sectors (Opportunities)';

    protected string $uploadPath = 'sectors';

    protected array $columns = ['title', 'slug', 'is_published', 'sort_order'];

    protected array $fields = [
        ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
        ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'required' => true, 'help' => 'URL segment, e.g. agri-business. Must match the icon key if you want a custom icon.'],
        ['name' => 'nav_label', 'label' => 'Nav label (optional)', 'type' => 'text'],
        ['name' => 'summary', 'label' => 'Short summary (used on listing cards)', 'type' => 'textarea', 'required' => true],
        ['name' => 'hero_heading', 'label' => 'Detail page headline', 'type' => 'text', 'required' => true],
        ['name' => 'hero_lead', 'label' => 'Detail page intro line', 'type' => 'textarea'],
        ['name' => 'intro', 'label' => 'Intro body', 'type' => 'richtext'],
        ['name' => 'services_offered', 'label' => 'Our Services (one per line)', 'type' => 'list'],
        ['name' => 'who_can_benefit', 'label' => 'Who Can Benefit (one per line)', 'type' => 'list'],
        ['name' => 'statement_quote', 'label' => 'Statement banner text', 'type' => 'textarea'],
        ['name' => 'cta_label', 'label' => 'Statement CTA button text (optional)', 'type' => 'text'],
        ['name' => 'image', 'label' => 'Photo', 'type' => 'image'],
        ['name' => 'seo_title', 'label' => 'SEO title (optional)', 'type' => 'text'],
        ['name' => 'seo_description', 'label' => 'SEO description (optional)', 'type' => 'textarea'],
        ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
        ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
    ];
}
