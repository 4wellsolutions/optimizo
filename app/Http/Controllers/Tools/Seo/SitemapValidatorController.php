<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SitemapValidatorController extends Controller
{
    /**
     * Display the sitemap validator tool
     */
    public function index()
    {
        $tool = (object) [
            'name' => __tool('sitemap-validator', 'meta.title', 'Sitemap Validator'),
            'slug' => 'sitemap-validator',
            'category' => 'seo'
        ];

        return view('tools.seo.sitemap-validator', compact('tool'));
    }

    /**
     * Fetch external sitemap via proxy to bypass CORS
     */
    public function fetch(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        try {
            $url = $request->input('url');

            // Use Laravel HTTP client to fetch the sitemap
            $response = \Illuminate\Support\Facades\Http::timeout(30)->get($url);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'content' => $response->body(),
                    'status' => $response->status()
                ]);
            }

            return response()->json([
                'success' => false,
                'error' => 'Failed to fetch sitemap',
                'status' => $response->status()
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Validate sitemap XML on the backend
     */
    public function validate(Request $request)
    {
        $request->validate([
            'url' => 'nullable|url',
            'xml' => 'nullable|string',
        ]);

        try {
            $xml = $request->input('xml');
            $url = $request->input('url');

            // If URL provided, fetch the sitemap first
            if ($url && !$xml) {
                try {
                    $response = \Illuminate\Support\Facades\Http::timeout(30)->get($url);
                } catch (\Illuminate\Http\Client\ConnectionException $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Unable to connect to the provided URL. Please verify the domain name is correct and accessible.',
                        'errors' => ['url' => ['Unable to connect to the website.']]
                    ], 422);
                } catch (\Exception $e) {
                    $msg = $e->getMessage();
                    if (str_contains($msg, 'Could not resolve host') || str_contains($msg, 'cURL error 6')) {
                        $msg = 'Invalid domain name or the server is down.';
                    } elseif (str_contains($msg, 'timeout') || str_contains($msg, 'cURL error 28')) {
                        $msg = 'The request timed out. The server took too long to respond.';
                    }

                    return response()->json([
                        'success' => false,
                        'message' => $msg,
                        'errors' => ['url' => [$msg]]
                    ], 422);
                }

                if (!$response->successful()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to fetch sitemap: HTTP ' . $response->status(),
                        'errors' => ['url' => ['Server returned HTTP ' . $response->status()]]
                    ], 422);
                }

                $xml = $response->body();
            }

            if (!$xml) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please provide either a URL or XML content'
                ], 422);
            }

            $result = $this->validateSitemapXml($xml, false);

            $html = view('tools.seo.sitemap-validator-results', compact('result'))->render();

            return response()->json([
                'success' => true,
                'html' => $html
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Validate sitemap XML content
     */
    private function validateSitemapXml($xmlString, $checkUrls = false)
    {
        $errors = [];
        $warnings = [];
        $urls = [];
        $stats = [];

        // Parse XML
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xmlString);

        if ($xml === false) {
            $xmlErrors = libxml_get_errors();
            foreach ($xmlErrors as $error) {
                $errors[] = [
                    'type' => 'XML Syntax Error',
                    'message' => trim($error->message),
                    'line' => $error->line
                ];
            }
            libxml_clear_errors();

            return [
                'valid' => false,
                'errors' => $errors,
                'warnings' => $warnings,
                'urls' => $urls,
                'stats' => $stats,
                'isSitemapIndex' => false
            ];
        }

        // Check if this is a sitemap index
        if ($xml->getName() === 'sitemapindex') {
            return $this->validateSitemapIndex($xml, $checkUrls);
        }

        // Validate regular sitemap
        if ($xml->getName() !== 'urlset') {
            $errors[] = [
                'type' => 'Invalid Root Element',
                'message' => 'Root element must be <urlset> or <sitemapindex>',
                'line' => null
            ];

            return [
                'valid' => false,
                'errors' => $errors,
                'warnings' => $warnings,
                'urls' => $urls,
                'stats' => $stats,
                'isSitemapIndex' => false
            ];
        }

        // Check namespace
        $namespaces = $xml->getNamespaces(true);
        if (!isset($namespaces['']) || $namespaces[''] !== 'http://www.sitemaps.org/schemas/sitemap/0.9') {
            $errors[] = [
                'type' => 'Invalid Namespace',
                'message' => 'Incorrect xmlns attribute. Should be "http://www.sitemaps.org/schemas/sitemap/0.9"',
                'line' => null
            ];
        }

        // Validate URLs
        $urlSet = [];
        $index = 0;

        foreach ($xml->url as $urlElement) {
            $index++;
            $loc = (string) $urlElement->loc;

            if (empty($loc)) {
                $errors[] = [
                    'type' => 'Missing Element',
                    'message' => "URL #{$index}: Missing <loc> element",
                    'line' => $index
                ];
                continue;
            }

            // Validate URL format
            if (!filter_var($loc, FILTER_VALIDATE_URL)) {
                $errors[] = [
                    'type' => 'Invalid URL',
                    'message' => "URL #{$index}: Invalid URL format - {$loc}",
                    'line' => $index
                ];
            }

            // Check URL length
            if (strlen($loc) > 2048) {
                $errors[] = [
                    'type' => 'URL Too Long',
                    'message' => "URL #{$index}: URL exceeds 2048 characters",
                    'line' => $index
                ];
            }

            // Check for duplicates
            if (in_array($loc, $urlSet)) {
                $warnings[] = [
                    'type' => 'Duplicate URL',
                    'message' => "URL #{$index}: Duplicate URL - {$loc}",
                    'line' => $index
                ];
            } else {
                $urlSet[] = $loc;
            }

            // Validate lastmod
            if (isset($urlElement->lastmod)) {
                $lastmod = (string) $urlElement->lastmod;
                if (!$this->isValidW3CDate($lastmod)) {
                    $warnings[] = [
                        'type' => 'Invalid Date',
                        'message' => "URL #{$index}: Invalid lastmod date format - {$lastmod}",
                        'line' => $index
                    ];
                }
            }

            // Validate changefreq
            if (isset($urlElement->changefreq)) {
                $validFreqs = ['always', 'hourly', 'daily', 'weekly', 'monthly', 'yearly', 'never'];
                $freq = (string) $urlElement->changefreq;
                if (!in_array($freq, $validFreqs)) {
                    $warnings[] = [
                        'type' => 'Invalid Changefreq',
                        'message' => "URL #{$index}: Invalid changefreq value - {$freq}",
                        'line' => $index
                    ];
                }
            }

            // Validate priority
            if (isset($urlElement->priority)) {
                $priority = (float) $urlElement->priority;
                if ($priority < 0 || $priority > 1) {
                    $warnings[] = [
                        'type' => 'Invalid Priority',
                        'message' => "URL #{$index}: Priority must be between 0.0 and 1.0",
                        'line' => $index
                    ];
                }
            }

            $urls[] = [
                'url' => $loc,
                'lastmod' => isset($urlElement->lastmod) ? (string) $urlElement->lastmod : null,
                'changefreq' => isset($urlElement->changefreq) ? (string) $urlElement->changefreq : null,
                'priority' => isset($urlElement->priority) ? (string) $urlElement->priority : null
            ];
        }

        // Check URL count
        if (count($urls) === 0) {
            $warnings[] = [
                'type' => 'Empty Sitemap',
                'message' => 'No URLs found in sitemap',
                'line' => null
            ];
        }

        if (count($urls) > 50000) {
            $errors[] = [
                'type' => 'Size Limit Exceeded',
                'message' => 'Sitemap contains ' . count($urls) . ' URLs. Maximum is 50,000',
                'line' => null
            ];
        }

        // Calculate file size
        $fileSize = strlen($xmlString);
        $fileSizeMB = round($fileSize / (1024 * 1024), 2);

        if ($fileSize > 52428800) { // 50MB
            $warnings[] = [
                'type' => 'File Size Warning',
                'message' => "Sitemap size ({$fileSizeMB}MB) exceeds recommended 50MB limit",
                'line' => null
            ];
        }

        $stats = [
            'totalUrls' => count($urls),
            'uniqueUrls' => count($urlSet),
            'fileSize' => $fileSize,
            'fileSizeMB' => $fileSizeMB,
            'errors' => count($errors),
            'warnings' => count($warnings)
        ];

        return [
            'valid' => count($errors) === 0,
            'isSitemapIndex' => false,
            'errors' => $errors,
            'warnings' => $warnings,
            'urls' => $urls,
            'stats' => $stats
        ];
    }

    /**
     * Validate sitemap index
     */
    private function validateSitemapIndex($xml, $checkUrls = false)
    {
        $errors = [];
        $warnings = [];
        $sitemaps = [];
        $allUrls = [];
        $totalUrls = 0;

        $index = 0;
        foreach ($xml->sitemap as $sitemapElement) {
            $index++;
            $loc = (string) $sitemapElement->loc;

            if (empty($loc)) {
                $errors[] = [
                    'type' => 'Missing Element',
                    'message' => "Sitemap #{$index}: Missing <loc> element",
                    'line' => $index
                ];
                continue;
            }

            // Fetch and validate sub-sitemap
            try {
                $response = \Illuminate\Support\Facades\Http::timeout(30)->get($loc);

                if (!$response->successful()) {
                    $warnings[] = [
                        'type' => 'Sitemap Fetch Failed',
                        'message' => "Sitemap #{$index}: Could not fetch {$loc} ({$response->status()})",
                        'line' => $index
                    ];

                    $sitemaps[] = [
                        'url' => $loc,
                        'lastmod' => isset($sitemapElement->lastmod) ? (string) $sitemapElement->lastmod : null,
                        'urlCount' => 0,
                        'status' => 'failed',
                        'error' => "HTTP {$response->status()}"
                    ];
                    continue;
                }

                $subResult = $this->validateSitemapXml($response->body(), false);

                $totalUrls += $subResult['stats']['totalUrls'] ?? 0;
                $allUrls = array_merge($allUrls, $subResult['urls'] ?? []);

                $sitemaps[] = [
                    'url' => $loc,
                    'lastmod' => isset($sitemapElement->lastmod) ? (string) $sitemapElement->lastmod : null,
                    'urlCount' => $subResult['stats']['totalUrls'] ?? 0,
                    'status' => $subResult['valid'] ? 'valid' : 'invalid',
                    'errors' => count($subResult['errors']),
                    'warnings' => count($subResult['warnings']),
                    'urls' => $subResult['urls'] ?? []
                ];

                // Merge errors and warnings
                foreach ($subResult['errors'] as $err) {
                    $errors[] = [
                        'type' => $err['type'],
                        'message' => "Sitemap \"{$loc}\": {$err['message']}",
                        'line' => $err['line']
                    ];
                }

                foreach ($subResult['warnings'] as $warn) {
                    $warnings[] = [
                        'type' => $warn['type'],
                        'message' => "Sitemap \"{$loc}\": {$warn['message']}",
                        'line' => $warn['line']
                    ];
                }

            } catch (\Exception $e) {
                $warnings[] = [
                    'type' => 'Sitemap Fetch Error',
                    'message' => "Sitemap #{$index}: {$e->getMessage()}",
                    'line' => $index
                ];

                $sitemaps[] = [
                    'url' => $loc,
                    'lastmod' => isset($sitemapElement->lastmod) ? (string) $sitemapElement->lastmod : null,
                    'urlCount' => 0,
                    'status' => 'error',
                    'error' => $e->getMessage()
                ];
            }
        }

        $stats = [
            'totalSitemaps' => count($sitemaps),
            'totalUrls' => $totalUrls,
            'errors' => count($errors),
            'warnings' => count($warnings)
        ];

        return [
            'valid' => count($errors) === 0,
            'isSitemapIndex' => true,
            'errors' => $errors,
            'warnings' => $warnings,
            'sitemaps' => $sitemaps,
            'urls' => $allUrls,
            'stats' => $stats
        ];
    }

    /**
     * Validate W3C date format
     */
    private function isValidW3CDate($dateStr)
    {
        // YYYY-MM-DD
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateStr)) {
            return true;
        }

        // YYYY-MM-DDThh:mm:ss+hh:mm or YYYY-MM-DDThh:mm:ssZ
        if (preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}([+-]\d{2}:\d{2}|Z)?$/', $dateStr)) {
            return true;
        }

        return false;
    }
}
