<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class Md5GeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'md5-generator')->firstOrFail();
        return view('tools.utility.md5-generator', compact('tool'));
    }
}
