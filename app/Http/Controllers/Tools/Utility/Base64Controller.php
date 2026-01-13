<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class Base64Controller extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'base64-encoder-decoder')->firstOrFail();
        return view('tools.utility.base64-encoder-decoder', compact('tool'));
    }
}
