<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class SentenceCaseConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'sentence-case-converter')->firstOrFail();
        return view("tools.converters.sentence-case-converter", compact('tool'));
    }
}
