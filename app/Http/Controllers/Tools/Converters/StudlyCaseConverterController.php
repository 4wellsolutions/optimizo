<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class StudlyCaseConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'studly-case-converter')->firstOrFail();
        return view("tools.converters.studly-case-converter", compact('tool'));
    }
}
