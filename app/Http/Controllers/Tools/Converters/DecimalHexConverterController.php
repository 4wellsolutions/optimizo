<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class DecimalHexConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'decimal-hex-converter')->firstOrFail();
        return view("tools.converters.decimal-hex-converter", compact('tool'));
    }
}
