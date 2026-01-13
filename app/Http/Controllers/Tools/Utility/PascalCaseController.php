<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class PascalCaseController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'pascal-case-converter')->firstOrFail();
        return view('tools.utility.pascal-case-converter', compact('tool'));
    }
}
