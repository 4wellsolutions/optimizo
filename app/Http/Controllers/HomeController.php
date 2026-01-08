<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get only 6 featured tools per category for homepage
        $youtubeTools = Tool::whereHas('categoryRelation', function ($q) {
            $q->where('slug', 'youtube');
        })
            ->where('is_active', true)
            ->orderBy('name')
            ->limit(6)
            ->get();

        $seoTools = Tool::whereHas('categoryRelation', function ($q) {
            $q->where('slug', 'seo');
        })
            ->where('is_active', true)
            ->orderBy('name')
            ->limit(6)
            ->get();

        $utilityTools = Tool::whereHas('categoryRelation', function ($q) {
            $q->where('slug', 'utility');
        })
            ->where('is_active', true)
            ->orderBy('name')
            ->limit(6)
            ->get();

        $networkTools = Tool::whereHas('categoryRelation', function ($q) {
            $q->where('slug', 'network');
        })
            ->where('is_active', true)
            ->orderBy('name')
            ->limit(6)
            ->get();

        return view('home', compact('youtubeTools', 'seoTools', 'utilityTools', 'networkTools'));
    }
}
