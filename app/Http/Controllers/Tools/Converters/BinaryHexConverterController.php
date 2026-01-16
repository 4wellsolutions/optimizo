<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class BinaryHexConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'binary-hex-converter')->firstOrFail();
        return view("tools.converters.binary-hex-converter", compact('tool'));
    }
}
