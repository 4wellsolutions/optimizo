<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()
            ->with(['author', 'categories'])
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('frontend.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->published()
            ->with(['author', 'categories', 'tags'])
            ->firstOrFail();

        $recentPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->limit(5)
            ->get();

        $categories = BlogCategory::withCount('posts')->get();

        return view('frontend.blog.show', compact('post', 'recentPosts', 'categories'));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
            ->published()
            ->with(['author', 'categories'])
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('frontend.blog.index', compact('posts', 'category'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()
            ->published()
            ->with(['author', 'categories'])
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('frontend.blog.index', compact('posts', 'tag'));
    }
}
