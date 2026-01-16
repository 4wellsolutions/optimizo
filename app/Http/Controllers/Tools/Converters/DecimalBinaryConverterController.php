<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class DecimalBinaryConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'decimal-binary-converter')->firstOrFail();
        return view("tools.converters.decimal-binary-converter", compact('tool'));
    }
}
