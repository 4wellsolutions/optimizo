<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class RgbHexConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'rgb-hex-converter')->firstOrFail();
        return view('tools.utility.rgb-hex-converter', compact('tool'));
    }
}
