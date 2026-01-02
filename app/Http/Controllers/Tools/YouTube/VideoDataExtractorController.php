<?php

namespace App\Http\Controllers\Tools\YouTube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VideoDataExtractorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'youtube-video-data-extractor')->firstOrFail();
        return view('tools.youtube.extractor', compact('tool'));
    }

    public function extract(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $videoId = $this->extractVideoId($request->url);

        if (!$videoId) {
            return response()->json(['success' => false, 'error' => 'Invalid YouTube URL.'], 400);
        }

        // Initialize Data with N/A
        $data = [
            'videoId' => $videoId,
            'title' => 'N/A',
            'channel' => 'N/A',
            'thumbnail' => "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg",
            'description' => 'N/A',
            'tags' => 'N/A',
            'views' => 'N/A',
            'likes' => 'N/A',
            'duration' => 'N/A',
            'publishDate' => 'N/A',
            'category' => 'N/A',
            'url' => $request->url
        ];

        try {
            // STRATEGY 1: Official oEmbed API (Public, Unblocked, No Key)
            // This guarantees Title, Author, Thumbnail at minimum.
            try {
                $oembedUrl = "https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$videoId}&format=json";
                $oembedResponse = Http::timeout(5)->get($oembedUrl);

                if ($oembedResponse->successful()) {
                    $oembed = $oembedResponse->json();
                    $data['title'] = $oembed['title'] ?? $data['title'];
                    $data['channel'] = $oembed['author_name'] ?? $data['channel'];
                    $data['thumbnail'] = $oembed['thumbnail_url'] ?? $data['thumbnail'];
                }
            } catch (\Exception $e) {
                // Ignore oEmbed failure, proceed to scraping
            }

            // STRATEGY 2: HTML Scraping for Extra Data (Views, Desc, Etc)
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept-Language' => 'en-US,en;q=0.9',
            ])->get("https://www.youtube.com/watch?v={$videoId}");

            $html = $response->body();

            // Try to find ytInitialPlayerResponse (Best source)
            if (preg_match('/var ytInitialPlayerResponse\s*=\s*(\{(?:[^{}]+|(?1))*\})/', $html, $matches)) {
                $json = json_decode($matches[1], true);

                $videoDetails = $json['videoDetails'] ?? [];
                $microformat = $json['microformat']['playerMicroformatRenderer'] ?? [];

                $data['title'] = $videoDetails['title'] ?? $data['title']; // Overwrite if available
                $data['description'] = $videoDetails['shortDescription'] ?? $data['description'];
                $data['tags'] = isset($videoDetails['keywords']) ? implode(', ', $videoDetails['keywords']) : $data['tags'];
                $data['channel'] = $videoDetails['author'] ?? $data['channel'];
                $data['views'] = isset($videoDetails['viewCount']) ? number_format($videoDetails['viewCount']) : $data['views'];
                $data['category'] = $microformat['category'] ?? $data['category'];

                // Publish Date
                if (isset($microformat['publishDate'])) {
                    $data['publishDate'] = date('F j, Y', strtotime($microformat['publishDate']));
                }

                // Duration
                $lengthSeconds = $videoDetails['lengthSeconds'] ?? ($microformat['lengthSeconds'] ?? null);
                if ($lengthSeconds) {
                    $hours = floor($lengthSeconds / 3600);
                    $minutes = floor(($lengthSeconds / 60) % 60);
                    $seconds = $lengthSeconds % 60;
                    if ($hours > 0) {
                        $data['duration'] = sprintf("%d:%02d:%02d", $hours, $minutes, $seconds);
                    } else {
                        $data['duration'] = sprintf("%d:%02d", $minutes, $seconds);
                    }
                }
            } else {
                // Fallback: Meta Tags Scraping (If JS object is missing from bot detection)
                if (preg_match('/<meta name="description" content="([^"]+)">/', $html, $m)) {
                    $data['description'] = htmlspecialchars_decode($m[1]);
                }
                if (preg_match('/<meta name="keywords" content="([^"]+)">/', $html, $m)) {
                    $data['tags'] = htmlspecialchars_decode($m[1]);
                }

                // Try JSON-LD (Schema.org)
                if (preg_match('/<script type="application\/ld\+json">({.*?})<\/script>/s', $html, $m)) {
                    $ldJson = json_decode($m[1], true);
                    $data['description'] = $ldJson['description'] ?? $data['description'];
                    $data['publishDate'] = isset($ldJson['uploadDate']) ? date('F j, Y', strtotime($ldJson['uploadDate'])) : $data['publishDate'];
                    $data['views'] = isset($ldJson['interactionCount']) ? number_format($ldJson['interactionCount']) : $data['views'];
                }
            }

            return response()->json(['success' => true, 'data' => $data]);

        } catch (\Exception $e) {
            // Even if everything crashes, return what we have from oEmbed or basic info
            return response()->json(['success' => true, 'data' => $data]);
        }
    }

    private function extractVideoId($url)
    {
        // Extract video ID from various YouTube URL formats
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ \s]{11})/';
        preg_match($pattern, $url, $matches);
        return $matches[1] ?? null;
    }
}
