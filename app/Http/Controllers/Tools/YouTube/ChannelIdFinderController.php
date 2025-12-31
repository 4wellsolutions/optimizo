<?php

namespace App\Http\Controllers\Tools\YouTube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ChannelIdFinderController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'youtube-channel-id-finder')->firstOrFail();
        return view('tools.youtube.channel-id-finder', compact('tool'));
    }

    public function find(Request $request)
    {
        $request->validate([
            'url' => 'required|string'
        ]);

        $channelUrl = $request->url;

        try {
            // Fetch channel page HTML
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $channelUrl);
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
                    'error' => 'Failed to fetch channel data. Please check the URL.'
                ], 400);
            }

            // Extract channel ID from various sources
            $channelId = null;
            $channelName = null;

            // Method 1: Look for channel ID in meta tags
            if (preg_match('/<meta itemprop="channelId" content="([^"]+)"/', $html, $matches)) {
                $channelId = $matches[1];
            }

            // Method 2: Extract from link tags
            if (!$channelId && preg_match('/<link rel="canonical" href="https:\/\/www\.youtube\.com\/channel\/([^"]+)"/', $html, $matches)) {
                $channelId = $matches[1];
            }

            // Method 3: Look in ytInitialData
            if (!$channelId && preg_match('/"channelId":"(UC[^"]+)"/', $html, $matches)) {
                $channelId = $matches[1];
            }

            // Method 4: Look in externalId
            if (!$channelId && preg_match('/"externalId":"(UC[^"]+)"/', $html, $matches)) {
                $channelId = $matches[1];
            }

            // Extract channel name
            if (preg_match('/<meta property="og:title" content="([^"]+)"/', $html, $matches)) {
                $channelName = $matches[1];
            } else if (preg_match('/<title>([^<]+)<\/title>/', $html, $matches)) {
                $channelName = str_replace(' - YouTube', '', $matches[1]);
            }

            if (!$channelId) {
                return response()->json([
                    'success' => false,
                    'error' => 'Could not find channel ID. Please make sure you entered a valid YouTube channel URL.'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'channelId' => $channelId,
                    'channelName' => $channelName,
                    'channelUrl' => 'https://www.youtube.com/channel/' . $channelId
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to find channel ID: ' . $e->getMessage()
            ], 500);
        }
    }
}
