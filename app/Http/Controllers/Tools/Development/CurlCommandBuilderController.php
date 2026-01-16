<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurlCommandBuilderController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'curl-command-builder')->first();
        return view("tools.development.curl-command-builder", compact('tool'));
    }
}
