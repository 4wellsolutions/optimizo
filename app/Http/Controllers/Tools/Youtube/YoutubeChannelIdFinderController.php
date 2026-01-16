<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeChannelIdFinderController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-channel-id-finder')->active()->firstOrFail();
        return view('tools.youtube.youtube-channel-id-finder', compact('tool'));
    }
}
