<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class StudlyCaseController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'studly-case-converter')->firstOrFail();
        return view('tools.utility.studly-case-converter', compact('tool'));
    }
}
