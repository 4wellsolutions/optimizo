<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class HtmlEncoderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'html-encoder-decoder')->firstOrFail();
        return view('tools.utility.html-encoder-decoder', compact('tool'));
    }
}
