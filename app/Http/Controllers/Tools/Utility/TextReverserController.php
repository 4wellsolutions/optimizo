<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class TextReverserController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'text-reverser')->firstOrFail();
        return view('tools.utility.text-reverser', compact('tool'));
    }
}
