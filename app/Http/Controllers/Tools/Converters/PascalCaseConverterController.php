<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class PascalCaseConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'pascal-case-converter')->firstOrFail();
        return view("tools.converters.pascal-case-converter", compact('tool'));
    }
}
