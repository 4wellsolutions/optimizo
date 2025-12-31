<?php

namespace App\Http\Controllers\Tools\YouTube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class VideoTagsExtractorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'youtube-video-tags-extractor')->firstOrFail();
        return view('tools.youtube.video-tags-extractor', compact('tool'));
    }

    public function extract(Request $request)
    {
        $request->validate([
            'url' => 'required|string'
        ]);

        $videoUrl = $request->url;

        try {
            // Extract video ID from URL
            $videoId = $this->extractVideoId($videoUrl);

            if (!$videoId) {
                return response()->json([
                    'success' => false,
                    'error' => 'Invalid YouTube video URL'
                ], 400);
            }

            // Fetch video page HTML
            $videoPageUrl = "https://www.youtube.com/watch?v={$videoId}";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $videoPageUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

            $html = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode !== 200 || !$html) {
                return response()->json([
                    'success' => false,
                    'error' => 'Failed to fetch video data'
                ], 400);
            }

            // Extract tags from meta keywords or JSON-LD data
            $tags = [];

            // Method 1: Try to find keywords in meta tags
            if (preg_match('/<meta name="keywords" content="([^"]+)"/', $html, $matches)) {
                $keywords = $matches[1];
                $tags = array_map('trim', explode(',', $keywords));
            }

            // Method 2: Extract from ytInitialData JSON
            if (empty($tags) && preg_match('/var ytInitialData = ({.+?});/', $html, $matches)) {
                $jsonData = $matches[1];
                $data = json_decode($jsonData, true);

                // Navigate through the complex YouTube data structure
                if (isset($data['contents']['twoColumnWatchNextResults']['results']['results']['contents'])) {
                    $contents = $data['contents']['twoColumnWatchNextResults']['results']['results']['contents'];
                    foreach ($contents as $content) {
                        if (isset($content['videoPrimaryInfoRenderer']['superTitleLink']['runs'])) {
                            foreach ($content['videoPrimaryInfoRenderer']['superTitleLink']['runs'] as $run) {
                                if (isset($run['text'])) {
                                    $tags[] = $run['text'];
                                }
                            }
                        }
                    }
                }
            }

            // Method 3: Look for keywords in the page source (fallback)
            if (empty($tags)) {
                // Try to extract from script tags containing video metadata
                if (preg_match('/"keywords":\s*\[([^\]]+)\]/', $html, $matches)) {
                    $keywordsJson = '[' . $matches[1] . ']';
                    $keywordsArray = json_decode($keywordsJson, true);
                    if (is_array($keywordsArray)) {
                        $tags = $keywordsArray;
                    }
                }
            }

            // Clean up tags
            $tags = array_filter($tags, function ($tag) {
                return !empty(trim($tag));
            });
            $tags = array_values(array_unique($tags));

            if (empty($tags)) {
                return response()->json([
                    'success' => false,
                    'error' => 'No tags found for this video. The video may not have any tags or they are not publicly accessible.'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'tags' => $tags
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to extract tags: ' . $e->getMessage()
            ], 500);
        }
    }

    private function extractVideoId($url)
    {
        $patterns = [
            '/youtube\.com\/watch\?v=([^&]+)/',
            '/youtu\.be\/([^?]+)/',
            '/youtube\.com\/embed\/([^?]+)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }
}
