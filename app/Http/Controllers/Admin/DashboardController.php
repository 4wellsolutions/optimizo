<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Media;
use App\Models\Redirect;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'published_posts' => Post::published()->count(),
            'draft_posts' => Post::draft()->count(),
            'total_media' => Media::count(),
            'total_redirects' => Redirect::where('status', true)->count(),
        ];

        $recent_posts = Post::with('author')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_posts'));
    }
}
