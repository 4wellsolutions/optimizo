<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class RandomNumberGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'random-number-generator')->active()->firstOrFail();
        return view('tools.utility.random-number-generator', compact('tool'));
    }
}
