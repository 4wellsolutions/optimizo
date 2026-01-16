<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class NumberBaseConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'number-base-converter')->firstOrFail();
        return view("tools.converters.number-base-converter", compact('tool'));
    }
}
