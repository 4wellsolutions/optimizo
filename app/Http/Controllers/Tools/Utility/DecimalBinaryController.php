<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class DecimalBinaryController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'decimal-binary-converter')->firstOrFail();
        return view('tools.utility.decimal-binary-converter', compact('tool'));
    }
}
