<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class BingSerpCheckerController extends Controller
{
    /**
     * Display the Bing SERP Checker tool page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tool = Tool::where('slug', 'bing-serp-checker')->first();

        if (!$tool) {
            $tool = new Tool([
                'name' => 'Bing SERP Checker',
                'description' => 'Check Bing search results from any location.',
                'slug' => 'bing-serp-checker'
            ]);
        }

        return view("tools.seo.bing-serp-checker", compact('tool'));
    }
}
