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

        // Correctly fetch tools based on whether it's a parent or subcategory
        if ($category->parent_id) {
            // It's a subcategory, tools are linked via subcategory_id
            $tools = $category->subTools()->active()->ordered()->get();
        } else {
            // It's a parent category, tools are linked via category_id
            $tools = $category->tools()->active()->ordered()->get();
        }

        return view('categories.index', compact('category', 'tools'));
    }
}
