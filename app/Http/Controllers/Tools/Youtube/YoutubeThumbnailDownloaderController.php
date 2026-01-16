<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class YoutubeThumbnailDownloaderController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-thumbnail-downloader')->active()->firstOrFail();
        return view('tools.youtube.youtube-thumbnail-downloader', compact('tool'));
    }
}
