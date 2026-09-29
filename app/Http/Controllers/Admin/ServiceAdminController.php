<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;

class ServiceAdminController extends ResourceController
{
    protected string $model = Service::class;

    protected string $routeBase = 'admin.services';

    protected string $title = 'Service';

    protected string $pluralTitle = 'Services';

    protected string $uploadPath = 'services';

    protected array $columns = ['title', 'slug', 'is_published', 'sort_order'];

    protected array $fields = [
        ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
        ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'required' => true, 'help' => 'URL segment, e.g. compliance. Must match the icon key if you want a custom icon.'],
        ['name' => 'nav_label', 'label' => 'Nav label (optional)', 'type' => 'text'],
        ['name' => 'summary', 'label' => 'Short summary (used on listing cards)', 'type' => 'textarea', 'required' => true],
        ['name' => 'hero_heading', 'label' => 'Detail page headline', 'type' => 'text', 'required' => true],
        ['name' => 'hero_lead', 'label' => 'Detail page intro line', 'type' => 'textarea'],
        ['name' => 'intro', 'label' => 'Intro body', 'type' => 'richtext'],
        ['name' => 'what_we_offer', 'label' => 'What We Offer (one per line)', 'type' => 'list'],
        ['name' => 'impact_quote', 'label' => 'Our Impact quote (optional)', 'type' => 'textarea'],
        ['name' => 'image', 'label' => 'Photo', 'type' => 'image'],
        ['name' => 'seo_title', 'label' => 'SEO title (optional)', 'type' => 'text'],
        ['name' => 'seo_description', 'label' => 'SEO description (optional)', 'type' => 'textarea'],
        ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
        ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
    ];
}
