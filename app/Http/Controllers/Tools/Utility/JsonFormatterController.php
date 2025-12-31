<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class JsonFormatterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'json-formatter')->firstOrFail();
        return view('tools.utility.json-formatter', compact('tool'));
    }
}
