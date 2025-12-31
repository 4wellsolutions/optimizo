<?php

namespace App\Http\Controllers\Tools\SEO;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class WordCounterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'word-counter')->firstOrFail();
        return view('tools.seo.word-counter', compact('tool'));
    }
}
