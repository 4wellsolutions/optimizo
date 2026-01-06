<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiffCheckerController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'diff-checker')->first();
        return view('tools.utility.diff-checker', compact('tool'));
    }
}
