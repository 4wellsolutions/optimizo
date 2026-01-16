<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class KeywordDensityCheckerController extends Controller
{
    /**
     * Display the Keyword Density Checker tool page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tool = Tool::where('slug', 'keyword-density-checker')->firstOrFail();
        return view("tools.seo.keyword-density-checker", compact('tool'));
    }
}
