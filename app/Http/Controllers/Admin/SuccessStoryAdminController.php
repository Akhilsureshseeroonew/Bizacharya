<?php

namespace App\Http\Controllers\Admin;

use App\Models\SuccessStory;

class SuccessStoryAdminController extends ResourceController
{
    protected string $model = SuccessStory::class;

    protected string $routeBase = 'admin.success-stories';

    protected string $title = 'Success Story';

    protected string $pluralTitle = 'Success Stories';

    protected string $uploadPath = 'stories';

    protected ?string $searchField = 'headline';

    protected array $columns = ['headline', 'name', 'featured', 'is_published', 'sort_order'];

    protected array $fields = [
        ['name' => 'headline', 'label' => 'Headline', 'type' => 'text', 'required' => true],
        ['name' => 'quote', 'label' => 'Quote', 'type' => 'textarea', 'required' => true],
        ['name' => 'name', 'label' => 'Entrepreneur name / business', 'type' => 'text', 'required' => true],
        ['name' => 'location', 'label' => 'Location (optional)', 'type' => 'text'],
        ['name' => 'sector_tag', 'label' => 'Tag (optional, e.g. "Success story")', 'type' => 'text'],
        ['name' => 'photo', 'label' => 'Photo (optional)', 'type' => 'image'],
        ['name' => 'featured', 'label' => 'Featured (shown in the homepage/success-stories carousel)', 'type' => 'checkbox'],
        ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
        ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
    ];
}
