<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class UnicodeEncoderDecoderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'unicode-encoder-decoder')->firstOrFail();
        return view("tools.development.unicode-encoder-decoder", compact('tool'));
    }
}
