<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class KebabCaseController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'kebab-case-converter')->firstOrFail();
        return view('tools.utility.kebab-case-converter', compact('tool'));
    }
}
