<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class MorseToTextController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'morse-to-text-converter')->firstOrFail();
        return view('tools.utility.morse-to-text-converter', compact('tool'));
    }
}
