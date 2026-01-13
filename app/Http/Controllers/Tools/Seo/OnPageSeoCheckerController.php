<?php

namespace App\Http\Controllers\Tools\Seo;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Services\OnPageSeoAnalyzer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class OnPageSeoCheckerController extends Controller
{
    protected $analyzer;

    /**
     * Create a new controller instance.
     *
     * @param OnPageSeoAnalyzer $analyzer
     */
    public function __construct(OnPageSeoAnalyzer $analyzer)
    {
        $this->analyzer = $analyzer;
    }

    /**
     * Display the On-Page SEO Checker tool page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tool = Tool::where('slug', 'on-page-seo-checker')->first();
        if (!$tool) {
            // Fallback object if tool not yet seeded
            $tool = new Tool([
                'name' => 'On-Page SEO Checker',
                'meta_title' => 'Free On-Page SEO Checker & Audit Tool',
                'meta_description' => 'Analyze and optimize your website with our free On-Page SEO Checker.',
                'meta_keywords' => 'seo checker, on page seo, seo audit, website analysis'
            ]);
        }
        return view('tools.seo.on-page-seo-checker', compact('tool'));
    }

    public function init(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'keywords' => 'nullable|string'
        ]);

        $url = $request->url;
        $cacheKey = 'seo_scan_' . md5($url);

        try {
            // Check cache first or fetch
            $html = Cache::remember($cacheKey, 600, function () use ($url) {
                $response = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (compatible; OptimizoBot/1.0; +https://optimizo.app)'
                ])->get($url);

                if ($response->failed()) {
                    throw new \Exception("Failed to fetch URL: " . $response->status());
                }

                return $response->body();
            });

            // Store Metadata for Report
            Cache::put('seo_meta_' . $cacheKey, [
                'url' => $url,
                'keywords' => $request->keywords,
                'date' => now()->toDayDateTimeString()
            ], 3600);

            // Initialize empty results array
            Cache::put('seo_results_' . $cacheKey, [], 3600);

            return response()->json([
                'success' => true,
                'token' => $cacheKey,
                'steps' => [
                    'topic_intent',
                    'keywords',
                    'title',
                    'meta_description',
                    'url_structure',
                    'headings',
                    'content_quality',
                    'gpt_optimization',
                    'mobile_ux',
                    'core_web_vitals',
                    'images',
                    'internal_links',
                    'external_links',
                    'schema',
                    'trust_signals',
                    'ai_citation',
                    'zero_click',
                    'canonical',
                    'indexing'
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

    public function analyzeStep(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'step' => 'required',
            'url' => 'required|url'
        ]);

        $html = Cache::get($request->token);
        if (!$html) {
            return response()->json(['success' => false, 'message' => 'Session expired'], 400);
        }

        $result = $this->analyzer->analyzeStep($request->step, $html, $request->url, $request->keywords);

        // Append to session results for PDF
        $currentResults = Cache::get('seo_results_' . $request->token, []);
        $currentResults[$request->step] = $result;
        Cache::put('seo_results_' . $request->token, $currentResults, 3600);

        return response()->json([
            'success' => true,
            'result' => $result
        ]);
    }

    public function exportPdf(Request $request)
    {
        $request->validate(['token' => 'required']);
        $token = $request->token;

        $results = Cache::get('seo_results_' . $token);
        $meta = Cache::get('seo_meta_' . $token);

        if (!$results || !$meta) {
            return redirect()->route('seo.on-page-seo-checker')->with('error', 'Report expired. Please run the audit again.');
        }

        $pdf = Pdf::loadView('tools.seo.pdf-report', [
            'results' => $results,
            'meta' => $meta
        ]);

        return $pdf->download('optimizo-seo-report.pdf');
    }
}
