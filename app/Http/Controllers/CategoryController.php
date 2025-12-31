<?php

namespace App\Http\Controllers;

use App\Models\Tool;

class CategoryController extends Controller
{
    public function youtube()
    {
        $tools = Tool::where('category', 'youtube')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('categories.youtube', compact('tools'));
    }

    public function seo()
    {
        $tools = Tool::where('category', 'seo')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('categories.seo', compact('tools'));
    }

    public function utility()
    {
        $tools = Tool::where('category', 'utility')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('categories.utility', compact('tools'));
    }

    public function network()
    {
        $tools = Tool::where('category', 'network')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('categories.network', compact('tools'));
    }
}
