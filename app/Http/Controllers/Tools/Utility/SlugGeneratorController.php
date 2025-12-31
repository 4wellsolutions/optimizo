<?php

namespace App\Http\Controllers\Tools\Utility;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class SlugGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'slug-generator')->firstOrFail();
        return view('tools.utility.slug-generator', compact('tool'));
    }
}
