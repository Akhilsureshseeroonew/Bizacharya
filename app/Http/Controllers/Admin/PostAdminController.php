<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;

class PostAdminController extends ResourceController
{
    protected string $model = Post::class;

    protected string $routeBase = 'admin.posts';

    protected string $title = 'Learning Hub Post';

    protected string $pluralTitle = 'Learning Hub Posts';

    protected string $uploadPath = 'posts';

    protected string $orderBy = 'published_at';

    protected string $orderDir = 'desc';

    protected array $columns = ['title', 'category', 'is_published', 'published_at'];

    protected array $fields = [
        ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
        ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'required' => true],
        ['name' => 'category', 'label' => 'Category', 'type' => 'select', 'required' => true, 'options' => [
            'blog' => 'Blog',
            'guide' => 'Entrepreneurship Guide (download)',
            'scheme' => 'Government Scheme (external link)',
            'literacy' => 'Financial Literacy (video)',
        ]],
        ['name' => 'excerpt', 'label' => 'Excerpt / card description', 'type' => 'textarea', 'required' => true],
        ['name' => 'body', 'label' => 'Body (blog articles only)', 'type' => 'richtext'],
        ['name' => 'cover_image', 'label' => 'Cover image', 'type' => 'image'],
        ['name' => 'file_path', 'label' => 'Downloadable file (guides only)', 'type' => 'file'],
        ['name' => 'external_url', 'label' => 'External URL (government schemes only)', 'type' => 'text'],
        ['name' => 'video_youtube_id', 'label' => 'YouTube video ID (financial literacy only)', 'type' => 'text'],
        ['name' => 'date_label', 'label' => 'Date label shown on card (optional, e.g. "Updated Aug 2026")', 'type' => 'text'],
        ['name' => 'read_time', 'label' => 'Read time (blog posts, e.g. "6 min read")', 'type' => 'text'],
        ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
        ['name' => 'published_at', 'label' => 'Published date', 'type' => 'date'],
        ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
    ];
}
