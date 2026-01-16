<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;

class JsonYamlController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('route_name', 'utility.json-yaml')->firstOrFail();
        return view("tools.development.json-to-yaml-converter", compact('tool'));
    }
}
