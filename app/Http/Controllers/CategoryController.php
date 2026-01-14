<?php

namespace App\Http\Controllers;

use App\Models\Tool;

class CategoryController extends Controller
{
    public function youtube()
    {
        return $this->showCategory('youtube');
    }

    public function seo()
    {
        return $this->showCategory('seo');
    }

    public function utility()
    {
        return $this->showCategory('utility');
    }

    public function network()
    {
        return $this->showCategory('network');
    }

    private function showCategory($slug)
    {
        $category = \App\Models\Category::where('slug', $slug)->firstOrFail();

        // Fetch all active tools for this category
        $tools = $category->tools()->active()->ordered()->get();

        return view('categories.index', compact('category', 'tools'));
    }
}
