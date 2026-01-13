<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class WordCounterController extends Controller
{
    /**
     * Display the Word Counter tool page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tool = Tool::where('slug', 'word-counter')->firstOrFail();
        return view('tools.seo.word-counter', compact('tool'));
    }
}
