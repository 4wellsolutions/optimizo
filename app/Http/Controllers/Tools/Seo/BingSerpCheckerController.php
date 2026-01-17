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
        $tool = Tool::where('slug', 'bing-serp-checker')->firstOrFail();
        return view("tools.seo.bing-serp-checker", compact('tool'));
    }

    public function process(\Illuminate\Http\Request $request)
    {
        // Placeholder for SERP checking logic
        return response()->json(['success' => true]);
    }
}
