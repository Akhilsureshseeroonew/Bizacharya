<?php

namespace App\Http\Controllers\Admin;

use App\Models\MenuItem;

class MenuItemAdminController extends ResourceController
{
    protected string $model = MenuItem::class;

    protected string $routeBase = 'admin.menu-items';

    protected string $title = 'Menu Item';

    protected string $pluralTitle = 'Navigation Menu';

    protected ?string $searchField = 'label';

    protected array $columns = ['menu', 'position', 'label', 'url', 'is_active', 'sort_order'];

    protected array $fields = [
        ['name' => 'menu', 'label' => 'Menu', 'type' => 'select', 'required' => true, 'options' => [
            'header' => 'Header (top navigation)',
            'footer_quick_links' => 'Footer — Quick Links column',
        ]],
        ['name' => 'position', 'label' => 'Position (header menu only)', 'type' => 'select', 'required' => true, 'options' => [
            'before' => 'Before the Opportunities/Services dropdowns',
            'after' => 'After the Opportunities/Services dropdowns',
        ], 'help' => 'Ignored for footer links, which always appear in sort order.'],
        ['name' => 'label', 'label' => 'Label', 'type' => 'text', 'required' => true],
        ['name' => 'url', 'label' => 'URL', 'type' => 'text', 'required' => true, 'help' => 'e.g. /about, /contact, or a full https:// link.'],
        ['name' => 'is_active', 'label' => 'Active (shown on the site)', 'type' => 'checkbox'],
        ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
    ];
}
