<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class DecimalHexController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'decimal-hex-converter')->firstOrFail();
        return view('tools.utility.decimal-hex-converter', compact('tool'));
    }
}
