<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class SentenceCaseController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'sentence-case-converter')->firstOrFail();
        return view('tools.utility.sentence-case-converter', compact('tool'));
    }
}
