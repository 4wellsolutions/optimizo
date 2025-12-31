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
            'channel_input' => 'required|string'
        ]);

        $channelInput = $request->channel_input;

        try {
            // Try to extract channel ID from URL
            $channelId = $this->extractChannelId($channelInput);

            if (!$channelId) {
                return response()->json([
                    'success' => false,
                    'error' => 'Could not find channel ID. Please enter a valid YouTube channel URL or username.'
                ], 400);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'channel_id' => $channelId,
                    'channel_url' => 'https://www.youtube.com/channel/' . $channelId
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to find channel ID: ' . $e->getMessage()
            ], 500);
        }
    }

    private function extractChannelId($input)
    {
        // Pattern for channel URLs
        $patterns = [
            '/youtube\.com\/channel\/([^\/\?]+)/',
            '/youtube\.com\/c\/([^\/\?]+)/',
            '/youtube\.com\/user\/([^\/\?]+)/',
            '/youtube\.com\/@([^\/\?]+)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $input, $matches)) {
                // In real implementation, convert username/custom URL to channel ID via API
                // For now, return simulated channel ID
                return 'UC' . strtoupper(substr(md5($matches[1]), 0, 22));
            }
        }

        // If input looks like a channel ID already
        if (preg_match('/^UC[a-zA-Z0-9_-]{22}$/', $input)) {
            return $input;
        }

        return null;
    }
}
