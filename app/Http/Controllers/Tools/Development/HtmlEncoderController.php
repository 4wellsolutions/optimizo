<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class HtmlEncoderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'html-encoder-decoder')->firstOrFail();
        return view('tools.development.html-encoder-decoder', compact('tool'));
    }
}
