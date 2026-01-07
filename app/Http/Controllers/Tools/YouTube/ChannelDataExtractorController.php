<?php

namespace App\Http\Controllers\Tools\YouTube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChannelDataExtractorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'youtube-channel-data-extractor')->firstOrFail();
        return view('tools.youtube.youtube-channel', compact('tool'));
    }

    public function extract(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $channelId = $this->extractChannelId($request->url);

        if (!$channelId) {
            return response()->json(['success' => false, 'error' => 'Invalid YouTube channel URL. Please enter a valid YouTube channel URL.'], 400);
        }

        // Scrape YouTube channel ABOUT page for metadata
        try {
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept-Language' => 'en-US,en;q=0.9'
            ])->get("https://www.youtube.com/{$channelId}/about", [
                        'hl' => 'en',
                        'gl' => 'US'
                    ]);

            $html = $response->body();

            // Initialize variables
            $name = 'N/A';
            $description = 'No description available';
            $subscribers = 'Hidden';
            $videoCount = 'N/A';
            $views = 'N/A';
            $joinDate = 'N/A';
            $country = 'N/A';
            $avatar = null;

            // Extract ytInitialData JSON
            if (preg_match('/var ytInitialData = ({.*?});/s', $html, $jsonMatch)) {
                $jsonData = json_decode($jsonMatch[1], true);

                // Get data from header
                if (isset($jsonData['header']['c4TabbedHeaderRenderer'])) {
                    $header = $jsonData['header']['c4TabbedHeaderRenderer'];

                    if (isset($header['title'])) {
                        $name = $header['title'];
                    }

                    if (isset($header['subscriberCountText']['simpleText'])) {
                        $subscribers = $header['subscriberCountText']['simpleText'];
                    }

                    if (isset($header['videosCountText']['runs'][0]['text'])) {
                        $videoCount = $header['videosCountText']['runs'][0]['text'];
                    }

                    if (isset($header['avatar']['thumbnails'])) {
                        $thumbnails = $header['avatar']['thumbnails'];
                        $avatar = end($thumbnails)['url'];
                    }
                }

                // Get metadata
                if (isset($jsonData['metadata']['channelMetadataRenderer'])) {
                    $metadata = $jsonData['metadata']['channelMetadataRenderer'];

                    if (isset($metadata['title']) && $name === 'N/A') {
                        $name = $metadata['title'];
                    }

                    if (isset($metadata['description'])) {
                        $description = $metadata['description'] ?: 'No description available';
                    }

                    if (!$avatar && isset($metadata['avatar']['thumbnails'])) {
                        $thumbnails = $metadata['avatar']['thumbnails'];
                        $avatar = end($thumbnails)['url'];
                    }
                }
            }

            // Fallback to meta tags
            if ($name === 'N/A' && preg_match('/<meta property="og:title" content="([^"]+)"/', $html, $match)) {
                $name = $match[1];
            }

            if ($description === 'No description available' && preg_match('/<meta property="og:description" content="([^"]*)"/', $html, $match)) {
                $description = $match[1] ?: 'No description available';
            }

            if (!$avatar && preg_match('/<meta property="og:image" content="([^"]+)"/', $html, $match)) {
                $avatar = $match[1];
            }

            $data = [
                'channelId' => $channelId,
                'name' => $name,
                'description' => $description,
                'subscribers' => $subscribers,
                'videoCount' => $videoCount,
                'views' => $views,
                'joinDate' => $joinDate,
                'country' => $country,
                'avatar' => $avatar,
                'url' => $request->url
            ];

            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to extract channel data. Please try again.'], 500);
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
