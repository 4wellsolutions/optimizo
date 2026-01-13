<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class TextToMorseController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'text-to-morse-converter')->firstOrFail();
        return view('tools.utility.text-to-morse-converter', compact('tool'));
    }
}
