<?php

namespace App\Http\Controllers\Tools\Converters;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class SnakeCaseConverterController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'snake-case-converter')->firstOrFail();
        return view("tools.converters.snake-case-converter", compact('tool'));
    }
}
