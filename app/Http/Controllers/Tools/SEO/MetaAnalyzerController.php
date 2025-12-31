<?php

namespace App\Http\Controllers\Tools\SEO;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class MetaAnalyzerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'meta-tag-analyzer')->firstOrFail();
        return view('tools.seo.meta-analyzer', compact('tool'));
    }
}
