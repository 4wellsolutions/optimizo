<?php

namespace App\Http\Controllers\Tools\Development;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XmlFormatterController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'xml-formatter')->first();
        return view("tools.development.xml-formatter", compact('tool'));
    }
}
