<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeVideoDataExtractorController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-video-data-extractor')->active()->firstOrFail();
        return view('tools.youtube.youtube-video-data-extractor', compact('tool'));
    }
}
