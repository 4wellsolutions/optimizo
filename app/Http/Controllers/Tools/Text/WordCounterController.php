<?php

namespace App\Http\Controllers\Tools\Text;

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
        return view("tools.text.word-counter", compact('tool'));
    }
}
