<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;

class LearningHubController extends Controller
{
    public function index()
    {
        $videos = Video::published()->ordered()->get();
        $posts = Post::published()->ordered()->get();

        return view('pages.learning-hub.index', compact('videos', 'posts'));
    }

    public function show(Post $post)
    {
        abort_unless($post->is_published && $post->category === 'blog', 404);

        $related = Post::published()->category('blog')->where('id', '!=', $post->id)->ordered()->take(3)->get();

        return view('pages.learning-hub.blog-detail', compact('post', 'related'));
    }
}
