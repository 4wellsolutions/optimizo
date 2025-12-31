<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get only 6 featured tools per category for homepage
        $youtubeTools = Tool::where('category', 'youtube')
            ->where('is_active', true)
            ->orderBy('name')
            ->limit(6)
            ->get();

        $seoTools = Tool::where('category', 'seo')
            ->where('is_active', true)
            ->orderBy('name')
            ->limit(6)
            ->get();

        $utilityTools = Tool::where('category', 'utility')
            ->where('is_active', true)
            ->orderBy('name')
            ->limit(6)
            ->get();

        $networkTools = Tool::where('category', 'network')
            ->where('is_active', true)
            ->orderBy('name')
            ->limit(6)
            ->get();

        return view('home', compact('youtubeTools', 'seoTools', 'utilityTools', 'networkTools'));
    }
}
