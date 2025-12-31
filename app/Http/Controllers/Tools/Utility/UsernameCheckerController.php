<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class UsernameCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'username-checker')->firstOrFail();
        return view('tools.utility.username-checker', compact('tool'));
    }
}
