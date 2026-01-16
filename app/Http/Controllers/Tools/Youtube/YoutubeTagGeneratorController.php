<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeTagGeneratorController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-tag-generator')->active()->firstOrFail();
        return view('tools.youtube.youtube-tag-generator', compact('tool'));
    }
}
