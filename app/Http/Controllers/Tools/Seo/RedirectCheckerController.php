<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;

class RedirectCheckerController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'redirect-checker')->firstOrFail();
        return view("tools.seo.redirect-checker", compact('tool'));
    }
    public function process(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'user_agent' => 'nullable|string'
        ]);

        $url = $request->input('url');
        $userAgent = $request->input('user_agent');

        $result = $this->traceChain($url, $userAgent);

        if ($result['error']) {
            return response()->json(['error' => $result['error']], 500);
        }

        return response()->json([
            'chain' => $result['chain'],
            'total_time' => collect($result['chain'])->sum('latency'),
            'redirect_count' => count($result['chain']) - 1,
            'is_loop' => $result['is_loop']
        ]);
    }

    public function checkCanonical(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'user_agent' => 'nullable|string'
        ]);

        $inputUrl = $request->input('url');
        $userAgent = $request->input('user_agent');
        $parsed = parse_url($inputUrl);
        $host = $parsed['host'] ?? $inputUrl; // Fallback if parse fails

        // Strip www. to get root domain
        $rootDomain = preg_replace('/^www\./', '', $host);

        $versions = [
            'http://' . $rootDomain,
            'http://www.' . $rootDomain,
            'https://' . $rootDomain,
            'https://www.' . $rootDomain
        ];

        $results = [];

        foreach ($versions as $version) {
            $trace = $this->traceChain($version, $userAgent);
            // Include error info if any, but don't fail the whole request
            $results[] = [
                'url' => $version,
                'chain' => $trace['chain'],
                'is_loop' => $trace['is_loop'],
                'error' => $trace['error']
            ];
        }

        return response()->json([
            'versions' => $results
        ]);
    }

    private function traceChain($url, $userAgent = null)
    {
        $chain = [];
        $maxHops = 20;
        $timeout = 10;
        $visitCounts = [];
        $isLoop = false;
        $error = null;

        $currentUrl = $url;

        // Default User Agent if not provided
        if (!$userAgent) {
            $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36';
        }

        try {
            for ($i = 0; $i < $maxHops; $i++) {
                $startTime = microtime(true);

                // Initialize count
                if (!isset($visitCounts[$currentUrl])) {
                    $visitCounts[$currentUrl] = 0;
                }
                $visitCounts[$currentUrl]++;

                // Loop Detection
                if ($visitCounts[$currentUrl] > 5) {
                    $chain[] = [
                        'url' => $currentUrl,
                        'status' => 'LOOP',
                        'statusText' => 'Redirect Loop Detected',
                        'isLoop' => true,
                        'isBroken' => true,
                        'headers' => [],
                        'latency' => 0
                    ];
                    $isLoop = true;
                    break;
                }

                try {
                    /** @var \Illuminate\Http\Client\Response $response */
                    $response = \Illuminate\Support\Facades\Http::withoutRedirecting()
                        ->withHeaders(['User-Agent' => $userAgent])
                        ->timeout($timeout)
                        ->get($currentUrl);

                    $endTime = microtime(true);
                    $latency = round(($endTime - $startTime) * 1000);
                    $status = $response->status();

                    $hop = [
                        'url' => $currentUrl,
                        'status' => $status,
                        'statusText' => $this->getStatusText($status),
                        'isRedirect' => $status >= 300 && $status < 400,
                        'isSuccess' => $status >= 200 && $status < 300,
                        'isBroken' => $status >= 400,
                        'headers' => $response->headers(),
                        'latency' => $latency
                    ];

                    $chain[] = $hop;

                    if ($hop['isRedirect']) {
                        $location = $response->header('Location');
                        if ($location) {
                            // Handle relative URLs
                            if (!preg_match('/^https?:\/\//', $location)) {
                                $parsedUrl = parse_url($currentUrl);
                                $baseUrl = $parsedUrl['scheme'] . '://' . ($parsedUrl['host'] ?? '');
                                if (substr($location, 0, 1) !== '/') {
                                    $location = '/' . $location;
                                }
                                $location = $baseUrl . $location;
                            }
                            $currentUrl = $location;
                            continue;
                        }
                    }
                    break;

                } catch (\Exception $e) {
                    $chain[] = [
                        'url' => $currentUrl,
                        'status' => 'ERROR',
                        'statusText' => $e->getMessage(),
                        'isBroken' => true,
                        'headers' => [],
                        'latency' => 0
                    ];
                    break;
                }
            }
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }

        return [
            'chain' => $chain,
            'is_loop' => $isLoop,
            'error' => $error
        ];
    }



    private function getStatusText($code)
    {
        $statusTexts = [
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            204 => 'No Content',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            307 => 'Temporary Redirect',
            308 => 'Permanent Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            408 => 'Request Timeout',
            410 => 'Gone',
            429 => 'Too Many Requests',
            500 => 'Internal Server Error',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
        ];

        return $statusTexts[$code] ?? 'Unknown Status';
    }

}
