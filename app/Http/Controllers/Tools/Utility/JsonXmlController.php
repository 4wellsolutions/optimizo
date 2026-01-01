<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;

class JsonXmlController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('route_name', 'utility.json-xml')->firstOrFail();
        return view('tools.utility.json-xml-converter', compact('tool'));
    }
}
