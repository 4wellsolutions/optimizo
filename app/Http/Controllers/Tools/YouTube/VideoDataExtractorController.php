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

        // Initialize Data
        $data = [
            'videoId' => $videoId,
            'title' => 'N/A',
            'channel' => 'N/A',
            'thumbnail' => "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg",
            // Note: maxresdefault is 404 for some videos, but client side handles it or we can check hqdefault
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
            // STRATEGY V11: Hybrid "Mobile First" + "Social Fallback"
            // 1. Try Mobile Site (Best for Full Description & Duration)
            // 2. If blocked/redirected (N/A), try Social Crawler (Best for Title/Tags/Views)

            // --- TIER 1: MOBILE SITE ---
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36',
                'Accept-Language' => 'en-US,en;q=0.9',
            ])->get("https://m.youtube.com/watch?v={$videoId}");

            if ($response->successful()) {
                $html = $response->body();

                // Description: Check for "attributedDescriptionBodyText" (Mobile specific)
                if (preg_match('/"attributedDescriptionBodyText"\s*:\s*\{\s*"content"\s*:\s*"([^"]+)"/', $html, $m)) {
                    $data['description'] = trim(json_decode('"' . $m[1] . '"'));
                } elseif (preg_match('/"description"\s*:\s*\{\s*"runs"\s*:\s*\[\s*\{\s*"text"\s*:\s*"([^"]+)"/', $html, $m)) {
                    // Standard Mobile runs
                    $data['description'] = trim(json_decode('"' . $m[1] . '"'));
                }

                // Title
                if (preg_match('/"title"\s*:\s*\{\s*"runs"\s*:\s*\[\s*\{\s*"text"\s*:\s*"([^"]+)"/', $html, $m)) {
                    $data['title'] = $m[1];
                }

                // Views
                if (preg_match('/"viewCount"\s*:\s*\{\s*"videoViewCountRenderer"\s*:\s*\{\s*"viewCount"\s*:\s*\{\s*"simpleText"\s*:\s*"([\d,]+) views"/', $html, $m)) {
                    $data['views'] = $m[1];
                }

                // Duration (Global Search)
                if (preg_match('/"lengthSeconds"\s*:\s*"(\d+)"/', $html, $m)) {
                    $seconds = $m[1];
                    $data['duration'] = $this->formatDuration($seconds);
                }

                // Channel
                if (preg_match('/"owner"\s*:\s*\{\s*"videoOwnerRenderer"\s*:\s*\{\s*.*?"title"\s*:\s*\{\s*"runs"\s*:\s*\[\s*\{\s*"text"\s*:\s*"([^"]+)"/', $html, $m)) {
                    $data['channel'] = $m[1];
                }
            }

            // --- TIER 2: SOCIAL CRAWLER (The "Bypass" Layer) ---
            // If main fields are still N/A (soft block), use Facebook UA
            if ($data['description'] === 'N/A' || $data['views'] === 'N/A') {
                try {
                    $socialResponse = Http::withHeaders([
                        'User-Agent' => 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)',
                        'Accept-Language' => 'en-US,en;q=0.9',
                    ])->get("https://www.youtube.com/watch?v={$videoId}");

                    if ($socialResponse->successful()) {
                        $socialHtml = $socialResponse->body();

                        // Title
                        if ($data['title'] === 'N/A' && preg_match('/<meta property="og:title"\s+content="([^"]+)"/', $socialHtml, $m)) {
                            $data['title'] = html_entity_decode($m[1]);
                        }

                        // Description (Even if truncated, better than N/A)
                        if ($data['description'] === 'N/A' && preg_match('/<meta property="og:description"\s+content="([^"]+)"/', $socialHtml, $m)) {
                            $data['description'] = html_entity_decode($m[1]);
                        }

                        // Views (InteractionCount)
                        if ($data['views'] === 'N/A' && preg_match('/<meta itemprop="interactionCount"\s+content="(\d+)"/', $socialHtml, $m)) {
                            $data['views'] = number_format((int) $m[1]);
                        }

                        // Tags (Social sets specific tags)
                        if (preg_match_all('/<meta property="og:video:tag"\s+content="([^"]+)"/', $socialHtml, $m)) {
                            if (!empty($m[1]))
                                $data['tags'] = implode(', ', $m[1]);
                        }
                    }
                } catch (\Exception $e) {
                }
            }

            // --- TIER 3: oEMBED (Final Fallback) ---
            if ($data['title'] === 'N/A' || $data['channel'] === 'N/A') {
                try {
                    $oembed = Http::get("https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$videoId}&format=json")->json();
                    $data['title'] = $oembed['title'] ?? $data['title'];
                    $data['channel'] = $oembed['author_name'] ?? $data['channel'];
                } catch (\Exception $e) {
                }
            }

            // Metadata Cleanups
            if ($data['description'] !== 'N/A')
                $data['description'] = strip_tags($data['description']);
            if ($data['tags'] === 'N/A' && isset($data['title'])) {
                // Last resort tags from title
                $data['tags'] = implode(', ', array_filter(explode(' ', preg_replace('/[^a-zA-Z0-9 ]/', '', $data['title'])), function ($w) {
                    return strlen($w) > 3; }));
            }

            return response()->json(['success' => true, 'data' => $data]);

        } catch (\Exception $e) {
            return response()->json(['success' => true, 'data' => $data]);
        }
    }

    private function extractVideoId($url)
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ \s]{11})/';
        preg_match($pattern, $url, $matches);
        return $matches[1] ?? null;
    }

    private function formatDuration($seconds)
    {
        if ($seconds <= 0)
            return 'N/A';
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $secs = $seconds % 60;
        return ($hours > 0)
            ? sprintf("%d:%02d:%02d", $hours, $minutes, $secs)
            : sprintf("%d:%02d", $minutes, $secs);
    }
}
