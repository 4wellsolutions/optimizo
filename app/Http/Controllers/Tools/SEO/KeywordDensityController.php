<?php

namespace App\Http\Controllers\Tools\SEO;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class KeywordDensityController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'keyword-density')->firstOrFail();
        return view('tools.seo.keyword-density', compact('tool'));
    }
}
