<?php

namespace App\Http\Controllers\Tools\YouTube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class MonetizationCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'youtube-monetization-checker')->firstOrFail();
        return view('tools.youtube.monetization-checker', compact('tool'));
    }

    public function check(Request $request)
    {
        $request->validate([
            'url' => 'required|string'
        ]);

        $url = $request->url;

        // Extract channel ID or handle
        $channelId = $this->extractChannelId($url);

        if (!$channelId) {
            return response()->json([
                'success' => false,
                'error' => 'Invalid YouTube channel URL or handle'
            ], 400);
        }

        try {
            // Fetch channel data (simplified - in production use YouTube Data API)
            $data = [
                'channelName' => 'Sample Channel',
                'subscribers' => '1.2M',
                'thumbnail' => 'https://via.placeholder.com/80',
                'isMonetized' => true,
                'estimatedStatus' => 'Eligible for YouTube Partner Program'
            ];

            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to check monetization status'], 500);
        }
    }

    private function extractChannelId($url)
    {
        // Match various YouTube channel URL formats
        $patterns = [
            '/youtube\.com\/(channel|c|user)\/([^\/\?]+)/',
            '/youtube\.com\/@([^\/\?]+)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                if (isset($matches[2])) {
                    return $matches[1] . '/' . $matches[2];
                } elseif (isset($matches[1])) {
                    return '@' . $matches[1];
                }
            }
        }

        return null;
    }
}
