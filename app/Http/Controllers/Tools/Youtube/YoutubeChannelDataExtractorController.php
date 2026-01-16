<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeChannelDataExtractorController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-channel-data-extractor')->active()->firstOrFail();
        return view('tools.youtube.youtube-channel-data-extractor', compact('tool'));
    }
}
