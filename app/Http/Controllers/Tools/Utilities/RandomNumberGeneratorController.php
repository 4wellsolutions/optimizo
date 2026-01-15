<?php

namespace App\Http\Controllers\Tools\Utilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RandomNumberGeneratorController extends Controller
{
    public function index()
    {
        $tool = \App\Models\Tool::where('slug', 'random-number-generator')->first();
        return view('tools.utility.random-number-generator', compact('tool'));
    }
}
