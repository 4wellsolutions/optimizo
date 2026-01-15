<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;

class JsonYamlController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('route_name', 'utility.json-yaml')->firstOrFail();
        return view('tools.utility.json-yaml-converter', compact('tool'));
    }
}
