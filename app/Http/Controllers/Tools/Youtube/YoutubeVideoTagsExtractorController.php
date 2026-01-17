<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YoutubeVideoTagsExtractorController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-video-tags-extractor')->active()->firstOrFail();
        return view('tools.youtube.youtube-video-tags-extractor', compact('tool'));
    }

    public function extract(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->url;

        try {
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept-Language' => 'en-US,en;q=0.9'
            ])->get($url);

            $html = $response->body();

            $tags = [];
            $title = null;
            $thumbnail = null;

            // Extract keywords/tags from meta tags
            if (preg_match('/<meta name="keywords" content="([^"]+)"/', $html, $matches)) {
                $tags = explode(',', $matches[1]);
                $tags = array_map('trim', $tags);
            }

            // Extract title
            if (preg_match('/<meta property="og:title" content="([^"]+)"/', $html, $matches)) {
                $title = $matches[1];
            }

            // Extract thumbnail
            if (preg_match('/<meta property="og:image" content="([^"]+)"/', $html, $matches)) {
                $thumbnail = $matches[1];
            }

            // Fallback for tags using videoDetailedMetadataRenderer or similar if needed,
            // but meta tags are usually sufficient for YouTube videos.

            if (empty($tags)) {
                // Try searching for "keywords":["tag1","tag2"]
                if (preg_match('/"keywords":\[(.*?)\]/', $html, $matches)) {
                    $tagsJson = '[' . $matches[1] . ']';
                    $tags = json_decode($tagsJson, true);
                }
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'tags' => $tags,
                    'title' => $title,
                    'thumbnail' => $thumbnail,
                    'url' => $url
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to extract video tags: ' . $e->getMessage()], 500);
        }
    }
}
