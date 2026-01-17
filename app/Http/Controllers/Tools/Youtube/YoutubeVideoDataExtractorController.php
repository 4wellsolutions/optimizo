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

    public function process(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $videoId = $this->extractVideoId($request->url);

        if (!$videoId) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'error' => 'Invalid YouTube URL. Please enter a valid YouTube video URL.'], 400);
            }
            return back()->with('error', 'Invalid YouTube URL');
        }

        // Scrape YouTube page for metadata
        try {
            $response = \Illuminate\Support\Facades\Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
            ])->get("https://www.youtube.com/watch?v={$videoId}");

            $html = $response->body();

            // Extract title
            preg_match('/"title":"([^"]+)"/', $html, $titleMatch);
            $title = isset($titleMatch[1]) ? json_decode('"' . $titleMatch[1] . '"') : 'N/A';

            // Extract description
            preg_match('/"description":{"simpleText":"([^"]+)"}/', $html, $descMatch);
            if (!isset($descMatch[1])) {
                preg_match('/"shortDescription":"([^"]+)"/', $html, $descMatch);
            }
            $description = isset($descMatch[1]) ? json_decode('"' . $descMatch[1] . '"') : 'N/A';

            // Extract keywords/tags
            preg_match('/"keywords":\[([^\]]+)\]/', $html, $keywordsMatch);
            $tags = 'N/A';
            if (isset($keywordsMatch[1])) {
                $tagsArray = json_decode('[' . $keywordsMatch[1] . ']');
                $tags = is_array($tagsArray) ? implode(', ', $tagsArray) : 'N/A';
            }

            // Extract channel name
            preg_match('/"author":"([^"]+)"/', $html, $authorMatch);
            $channel = isset($authorMatch[1]) ? json_decode('"' . $authorMatch[1] . '"') : 'N/A';

            // Extract view count
            preg_match('/"viewCount":"(\d+)"/', $html, $viewMatch);
            $views = isset($viewMatch[1]) ? number_format($viewMatch[1]) : 'N/A';

            // Extract publish date
            preg_match('/"publishDate":"([^"]+)"/', $html, $dateMatch);
            $publishDate = $dateMatch[1] ?? 'N/A';

            // Extract likes
            preg_match('/"label":"([\d,\.]+[KMB]?) likes?"/', $html, $likesMatch);
            if (!isset($likesMatch[1])) {
                preg_match('/"accessibilityText":"([\d,]+) likes"/', $html, $likesMatch);
            }
            $likes = $likesMatch[1] ?? 'N/A';

            // Extract category
            preg_match('/"category":"([^"]+)"/', $html, $categoryMatch);
            if (!isset($categoryMatch[1])) {
                preg_match('/"genre":"([^"]+)"/', $html, $categoryMatch);
            }
            $category = isset($categoryMatch[1]) ? json_decode('"' . $categoryMatch[1] . '"') : 'N/A';

            // Get thumbnail
            $thumbnail = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";

            $data = [
                'videoId' => $videoId,
                'title' => $title,
                'description' => $description,
                'tags' => $tags,
                'channel' => $channel,
                'views' => $views,
                'likes' => $likes,
                'publishDate' => $publishDate,
                'category' => $category,
                'thumbnail' => $thumbnail,
                'url' => $request->url
            ];

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'data' => $data]);
            }

            return view('tools.youtube.youtube-video-data-extractor', compact('data'));
        } catch (\Exception $e) {
            $error = 'Failed to extract video data. Please try again.';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'error' => $error], 500);
            }
            return back()->with('error', $error);
        }
    }

    private function extractVideoId($url)
    {
        // Extract video ID from various YouTube URL formats
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
        preg_match($pattern, $url, $matches);
        return $matches[1] ?? null;
    }
}
