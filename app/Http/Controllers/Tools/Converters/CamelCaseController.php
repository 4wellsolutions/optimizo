<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class CamelCaseController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'camel-case-converter')->firstOrFail();
        return view('tools.utility.camel-case-converter', compact('tool'));
    }
}
