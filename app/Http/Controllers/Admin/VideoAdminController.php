<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;

class VideoAdminController extends ResourceController
{
    protected string $model = Video::class;

    protected string $routeBase = 'admin.videos';

    protected string $title = 'Video';

    protected string $pluralTitle = 'Learning Hub Videos';

    protected array $columns = ['title', 'youtube_id', 'is_published', 'sort_order'];

    protected array $fields = [
        ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
        ['name' => 'youtube_id', 'label' => 'YouTube video ID', 'type' => 'text', 'required' => true, 'help' => 'The part after v= in the YouTube URL.'],
        ['name' => 'duration', 'label' => 'Duration (e.g. 12:40)', 'type' => 'text'],
        ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
        ['name' => 'sort_order', 'label' => 'Sort order', 'type' => 'number'],
    ];
}
