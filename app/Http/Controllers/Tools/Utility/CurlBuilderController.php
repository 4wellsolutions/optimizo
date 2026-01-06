<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurlBuilderController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'curl-command-builder')->first();
        return view('tools.utility.curl-command-builder', compact('tool'));
    }
}
