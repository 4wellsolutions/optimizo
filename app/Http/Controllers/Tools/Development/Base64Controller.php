<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class Base64Controller extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'base64-encoder-decoder')->firstOrFail();
        return view('tools.development.base64-encoder-decoder', compact('tool'));
    }
}
