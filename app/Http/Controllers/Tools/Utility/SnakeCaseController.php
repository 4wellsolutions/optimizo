<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class SnakeCaseController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'snake-case-converter')->firstOrFail();
        return view('tools.utility.snake-case-converter', compact('tool'));
    }
}
