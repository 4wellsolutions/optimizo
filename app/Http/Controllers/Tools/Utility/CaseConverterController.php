<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class CaseConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'case-converter')->firstOrFail();
        return view('tools.utility.case-converter', compact('tool'));
    }
}
