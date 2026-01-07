<?php

namespace App\Http\Controllers\Tools\YouTube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ThumbnailDownloaderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'youtube-thumbnail-downloader')->firstOrFail();
        return view('tools.youtube.youtube-thumbnail-downloader', compact('tool'));
    }

    public function download(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $videoId = $this->extractVideoId($request->url);

        if (!$videoId) {
            return response()->json(['success' => false, 'error' => 'Invalid YouTube URL. Please enter a valid YouTube video URL.'], 400);
        }

        $thumbnails = [
            'maxresdefault' => [
                'url' => "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg",
                'quality' => 'Maximum Resolution',
                'resolution' => '1280x720',
                'size' => 'HD'
            ],
            'sddefault' => [
                'url' => "https://img.youtube.com/vi/{$videoId}/sddefault.jpg",
                'quality' => 'Standard Definition (Default)',
                'resolution' => '640x480',
                'size' => 'SD'
            ],
            'hqdefault' => [
                'url' => "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg",
                'quality' => 'High Quality',
                'resolution' => '480x360',
                'size' => 'HQ'
            ],
            'mqdefault' => [
                'url' => "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg",
                'quality' => 'Medium Quality',
                'resolution' => '320x180',
                'size' => 'MQ'
            ],
        ];

        return response()->json(['success' => true, 'thumbnails' => $thumbnails, 'videoId' => $videoId]);
    }

    private function extractVideoId($url)
    {
        // Extract video ID from various YouTube URL formats
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ \s]{11})/';
        preg_match($pattern, $url, $matches);
        return $matches[1] ?? null;
    }
}
