<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SeoController extends Controller
{
    public function metaAnalyzer()
    {
        return view('tools.seo.meta-tag-analyzer');
    }

    public function analyzeMeta(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        try {
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
            ])->timeout(10)->get($request->url);

            $html = $response->body();

            // Extract meta tags
            $metaTags = [];

            // Title
            preg_match('/<title[^>]*>(.*?)<\/title>/is', $html, $titleMatch);
            $metaTags['title'] = $titleMatch[1] ?? 'Not found';

            // Meta description
            preg_match('/<meta\s+name=["\']description["\']\s+content=["\'](.*?)["\']/i', $html, $descMatch);
            $metaTags['description'] = $descMatch[1] ?? 'Not found';

            // Meta keywords
            preg_match('/<meta\s+name=["\']keywords["\']\s+content=["\'](.*?)["\']/i', $html, $keyMatch);
            $metaTags['keywords'] = $keyMatch[1] ?? 'Not found';

            // OG tags
            preg_match_all('/<meta\s+property=["\']og:([^"\']+)["\']\s+content=["\'](.*?)["\']/i', $html, $ogMatches, PREG_SET_ORDER);
            $metaTags['og'] = [];
            foreach ($ogMatches as $match) {
                $metaTags['og'][$match[1]] = $match[2];
            }

            // Twitter tags
            preg_match_all('/<meta\s+name=["\']twitter:([^"\']+)["\']\s+content=["\'](.*?)["\']/i', $html, $twitterMatches, PREG_SET_ORDER);
            $metaTags['twitter'] = [];
            foreach ($twitterMatches as $match) {
                $metaTags['twitter'][$match[1]] = $match[2];
            }

            // Canonical URL
            preg_match('/<link\s+rel=["\']canonical["\']\s+href=["\'](.*?)["\']/i', $html, $canonicalMatch);
            $metaTags['canonical'] = $canonicalMatch[1] ?? 'Not found';

            // Calculate SEO score
            $score = $this->calculateSeoScore($metaTags);

            return view('tools.seo.meta-tag-analyzer', compact('metaTags', 'score'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to analyze URL. Please check the URL and try again.');
        }
    }

    public function keywordDensity()
    {
        return view('tools.seo.keyword-density-checker');
    }

    public function analyzeKeywords(Request $request)
    {
        $request->validate([
            'text' => 'required|string'
        ]);

        $text = strtolower($request->text);
        $words = str_word_count($text, 1);
        $totalWords = count($words);

        // Count word frequency
        $wordCount = array_count_values($words);
        arsort($wordCount);

        // Calculate density
        $keywords = [];
        $stopWords = ['the', 'a', 'an', 'and', 'or', 'but', 'in', 'on', 'at', 'to', 'for', 'of', 'with', 'by', 'from', 'as', 'is', 'was', 'are', 'were', 'been', 'be', 'have', 'has', 'had', 'do', 'does', 'did', 'will', 'would', 'could', 'should', 'may', 'might', 'can', 'this', 'that', 'these', 'those', 'i', 'you', 'he', 'she', 'it', 'we', 'they', 'what', 'which', 'who', 'when', 'where', 'why', 'how'];

        foreach ($wordCount as $word => $count) {
            if (strlen($word) > 2 && !in_array($word, $stopWords)) {
                $density = ($count / $totalWords) * 100;
                $keywords[] = [
                    'word' => $word,
                    'count' => $count,
                    'density' => round($density, 2)
                ];
            }
        }

        // Limit to top 20
        $keywords = array_slice($keywords, 0, 20);

        return view('tools.seo.keyword-density-checker', compact('keywords', 'totalWords'));
    }

    public function wordCounter()
    {
        return view('tools.seo.word-counter');
    }

    private function calculateSeoScore($metaTags)
    {
        $score = 0;

        // Title (20 points)
        if ($metaTags['title'] !== 'Not found') {
            $titleLength = strlen($metaTags['title']);
            if ($titleLength >= 30 && $titleLength <= 60) {
                $score += 20;
            } elseif ($titleLength > 0) {
                $score += 10;
            }
        }

        // Description (20 points)
        if ($metaTags['description'] !== 'Not found') {
            $descLength = strlen($metaTags['description']);
            if ($descLength >= 120 && $descLength <= 160) {
                $score += 20;
            } elseif ($descLength > 0) {
                $score += 10;
            }
        }

        // Keywords (10 points)
        if ($metaTags['keywords'] !== 'Not found') {
            $score += 10;
        }

        // OG tags (25 points)
        if (!empty($metaTags['og'])) {
            $ogScore = min(count($metaTags['og']) * 5, 25);
            $score += $ogScore;
        }

        // Twitter tags (15 points)
        if (!empty($metaTags['twitter'])) {
            $twitterScore = min(count($metaTags['twitter']) * 5, 15);
            $score += $twitterScore;
        }

        // Canonical (10 points)
        if ($metaTags['canonical'] !== 'Not found') {
            $score += 10;
        }

        return min($score, 100);
    }
}
