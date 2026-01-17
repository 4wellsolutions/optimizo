<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YoutubeChannelIdFinderController extends Controller
{
    public function index()
    {
        $tool = Tool::with(['categoryRelation'])->where('slug', 'youtube-channel-id-finder')->active()->firstOrFail();
        return view('tools.youtube.youtube-channel-id-finder', compact('tool'));
    }

    public function find(Request $request)
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

            $channelId = null;
            $channelName = null;
            $channelUrl = null;

            // Try to find channelId in meta tags or ytInitialData
            if (preg_match('/"channelId":"(UC[a-zA-Z0-9_-]{22})"/', $html, $matches)) {
                $channelId = $matches[1];
            } elseif (preg_match('/<meta itemprop="channelId" content="(UC[a-zA-Z0-9_-]{22})"/', $html, $matches)) {
                $channelId = $matches[1];
            } elseif (preg_match('/"externalId":"(UC[a-zA-Z0-9_-]{22})"/', $html, $matches)) {
                $channelId = $matches[1];
            }

            // Extract channel name
            if (preg_match('/<meta property="og:title" content="([^"]+)"/', $html, $matches)) {
                $channelName = $matches[1];
            }

            // Extract canonical URL
            if (preg_match('/<link rel="canonical" href="([^"]+)"/', $html, $matches)) {
                $channelUrl = $matches[1];
            }

            if (!$channelId) {
                return response()->json(['success' => false, 'error' => 'Could not find YouTube Channel ID. Please make sure the URL is correct.'], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'channelId' => $channelId,
                    'channelName' => $channelName,
                    'channelUrl' => $channelUrl ?: $url
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to fetch channel data: ' . $e->getMessage()], 500);
        }
    }
}
