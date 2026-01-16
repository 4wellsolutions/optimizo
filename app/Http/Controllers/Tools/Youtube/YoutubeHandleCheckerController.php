<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeHandleCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-handle-checker')->active()->firstOrFail();
        return view('tools.youtube.youtube-handle-checker', compact('tool'));
    }
}
