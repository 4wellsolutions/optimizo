<?php

namespace App\Http\Controllers\Tools\YouTube;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class TagsGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'youtube-tags')->firstOrFail();
        return view('tools.youtube.tags', compact('tool'));
    }
}
