<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class HreflangCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'hreflang-checker')->first();

        // Fallback for development if tool not seeded yet
        if (!$tool) {
            $tool = new Tool([
                'name' => 'Hreflang Checker',
                'slug' => 'hreflang-checker',
                'description' => 'Check hreflang tags on your website.',
            ]);
        }

        return view("tools.seo.hreflang-checker", compact('tool'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $url = $request->input('url');
        $userAgent = $request->input('user_agent', 'Mozilla/5.0 (compatible; HreflangChecker/1.0)');

        try {
            $response = Http::withHeaders(['User-Agent' => $userAgent])
                ->timeout(10)
                ->get($url);

            if ($response->failed()) {
                return back()->withErrors(['url' => 'Failed to fetch the URL. Status Code: ' . $response->status()]);
            }

            $html = $response->body();
            $headers = $response->headers();

            $tags = $this->extractHreflangTags($html, $headers, $url);

            // Verify return tags
            $results = $this->verifyReturnTags($tags, $url, $userAgent);

            if ($request->ajax()) {
                return view('tools.seo.partials.hreflang-results', compact('results', 'url'));
            }

            $tool = Tool::where('slug', 'hreflang-checker')->first();
            // Fallback for development if tool not seeded yet
            if (!$tool) {
                $tool = new Tool([
                    'name' => 'Hreflang Checker',
                    'slug' => 'hreflang-checker',
                    'description' => 'Check hreflang tags on your website.',
                ]);
            }
            return view("tools.seo.hreflang-checker", compact('results', 'url', 'tool'));

        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['error' => $e->getMessage()], 422);
            }
            return back()->withErrors(['url' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    private function extractHreflangTags($html, $headers, $baseUrl)
    {
        $tags = [];

        // 1. Parse HTML using voku/simple_html_dom (already installed)
        // 1. Parse HTML using voku/simple_html_dom
        $dom = \voku\helper\HtmlDomParser::str_get_html($html);
        $elements = $dom->find('link'); // Find all link tags

        foreach ($elements as $node) {
            $rel = $node->getAttribute('rel');
            $hreflang = $node->getAttribute('hreflang');
            $href = $node->getAttribute('href');

            // Check attributes loosely/case-insensitively if needed, but standard is lowercase
            if ($rel === 'alternate' && $hreflang && $href) {
                // Normalize URL
                $href = $this->normalizeUrl($href, $baseUrl);
                $tags[] = [
                    'hreflang' => $hreflang,
                    'url' => $href,
                    'source' => 'HTML Head',
                ];
            }
        }

        // 2. Parse Headers
        // Link: <http://es.example.com/>; rel="alternate"; hreflang="es"
        if (isset($headers['Link'])) {
            $linkHeaders = is_array($headers['Link']) ? $headers['Link'] : [$headers['Link']];
            foreach ($linkHeaders as $linkHeader) {
                if (strpos($linkHeader, 'rel="alternate"') !== false && strpos($linkHeader, 'hreflang=') !== false) {
                    // Check if multiple links are comma separated in one header line
                    $parts = explode(',', $linkHeader);
                    foreach ($parts as $part) {
                        if (preg_match('/<([^>]+)>;.+hreflang="([^"]+)"/i', $part, $matches)) {
                            $href = $matches[1];
                            $hreflang = $matches[2];
                            $tags[] = [
                                'hreflang' => $hreflang,
                                'url' => $href,
                                'source' => 'HTTP Header',
                            ];
                        }
                    }
                }
            }
        }

        return $tags;
    }

    private function normalizeUrl($url, $baseUrl)
    {
        if (parse_url($url, PHP_URL_SCHEME)) {
            return $url;
        }

        // Handle relative URLs
        if (Str::startsWith($url, '/')) {
            $parsedBase = parse_url($baseUrl);
            return $parsedBase['scheme'] . '://' . $parsedBase['host'] . $url;
        }

        return rtrim($baseUrl, '/') . '/' . $url;
    }

    private function verifyReturnTags($tags, $originUrl, $userAgent)
    {
        // Use HTTP Pool for concurrent requests to speed up verification
        $responses = Http::pool(function ($pool) use ($tags, $userAgent) {
            foreach ($tags as $index => $tag) {
                $pool->as($index)->withHeaders(['User-Agent' => $userAgent])->timeout(5)->get($tag['url']);
            }
        });

        foreach ($tags as $index => &$tag) {
            $response = $responses[$index];
            $tag['return_tag_status'] = 'Missing';
            $tag['return_tag_found'] = false;
            $tag['http_status'] = 0;

            if ($response instanceof \Illuminate\Http\Client\Response && $response->successful()) {
                $tag['http_status'] = $response->status();

                $altHtml = $response->body();
                $altDom = \voku\helper\HtmlDomParser::str_get_html($altHtml);

                // Find matching return link
                $returnLinks = $altDom->find('link[rel="alternate"]');
                $found = false;

                $originUrlTrimmed = rtrim($originUrl, '/');

                foreach ($returnLinks as $link) {
                    $href = $link->getAttribute('href');
                    if (!$href)
                        continue;

                    $hrefTrimmed = rtrim($href, '/');

                    if ($hrefTrimmed === $originUrlTrimmed) {
                        $found = true;
                        break;
                    }
                }

                if ($found) {
                    $tag['return_tag_status'] = 'Valid';
                    $tag['return_tag_found'] = true;
                }

            } elseif ($response instanceof \Illuminate\Http\Client\Response) {
                $tag['http_status'] = $response->status();
                $tag['return_tag_status'] = 'Error: ' . $response->status();
            } else {
                $tag['return_tag_status'] = 'Timeout/Error';
            }
        }

        return $tags;
    }
}
