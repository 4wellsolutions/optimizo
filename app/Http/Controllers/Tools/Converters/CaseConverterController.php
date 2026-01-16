<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class CaseConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'case-converter')->firstOrFail();
        return view("tools.converters.case-converter", compact('tool'));
    }
}
