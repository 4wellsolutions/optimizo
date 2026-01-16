<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class KebabCaseConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'kebab-case-converter')->firstOrFail();
        return view("tools.converters.kebab-case-converter", compact('tool'));
    }
}
