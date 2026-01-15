<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class UnicodeEncoderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'unicode-encoder-decoder')->firstOrFail();
        return view('tools.development.unicode-encoder-decoder', compact('tool'));
    }
}
