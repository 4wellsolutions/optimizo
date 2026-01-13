<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class UrlEncoderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'url-encoder-decoder')->firstOrFail();
        return view('tools.utility.url-encoder-decoder', compact('tool'));
    }
}
