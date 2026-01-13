<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class MetaAnalyzerController extends Controller
{
    /**
     * Display the Meta Tag Analyzer tool page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tool = Tool::where('slug', 'meta-tag-analyzer')->firstOrFail();
        return view('tools.seo.meta-analyzer', compact('tool'));
    }
}
