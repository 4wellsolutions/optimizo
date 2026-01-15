<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class BinaryHexController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'binary-hex-converter')->firstOrFail();
        return view('tools.utility.binary-hex-converter', compact('tool'));
    }
}
