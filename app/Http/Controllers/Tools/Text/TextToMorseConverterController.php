<?php

namespace App\Http\Controllers\Tools\Text;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class TextToMorseConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'text-to-morse-converter')->firstOrFail();
        return view("tools.text.text-to-morse-converter", compact('tool'));
    }
}
