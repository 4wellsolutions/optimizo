<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class UrlEncoderDecoderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'url-encoder-decoder')->firstOrFail();
        return view("tools.development.url-encoder-decoder", compact('tool'));
    }
}
