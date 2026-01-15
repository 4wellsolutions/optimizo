<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class DecimalOctalController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'decimal-octal-converter')->firstOrFail();
        return view('tools.utility.decimal-octal-converter', compact('tool'));
    }
}
