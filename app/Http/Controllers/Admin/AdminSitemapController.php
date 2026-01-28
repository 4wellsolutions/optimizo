<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminSitemapController extends Controller
{
    public function index()
    {
        $domain = url('/');

        // Get all active languages
        $languages = Language::where('is_active', true)->get();

        // Get sitemap statistics for all languages
        $sitemaps = $this->getSitemapStatistics($domain, $languages);

        return view('admin.sitemap.index', compact('sitemaps', 'languages', 'domain'));
    }

    /**
     * Get statistics for all sitemaps
     */
    private function getSitemapStatistics($domain, $languages)
    {
        $sitemaps = [];

        // Sitemap Index
        $indexPath = public_path('sitemap.xml');
        $sitemaps[] = [
            'name' => 'Sitemap Index',
            'url' => $domain . '/sitemap.xml',
            'type' => 'index',
            'language' => 'all',
            'count' => $languages->count(),
            'exists' => File::exists($indexPath),
            'lastmod' => File::exists($indexPath) ? date('Y-m-d H:i:s', File::lastModified($indexPath)) : null,
        ];

        // Language-specific sitemaps
        foreach ($languages as $language) {
            $filename = "sitemap_{$language->code}.xml";
            $path = public_path($filename);

            $urlCount = 0;
            $blogCount = 0;
            if (File::exists($path)) {
                $xmlContent = File::get($path);
                $urlCount = substr_count($xmlContent, '<loc>');
                $blogCount = substr_count($xmlContent, '/blog/');
            }

            $sitemaps[] = [
                'name' => ucfirst($language->name) . ' Sitemap',
                'url' => $domain . '/' . $filename,
                'type' => 'language',
                'language' => $language->code,
                'count' => $urlCount,
                'blog_count' => $blogCount,
                'exists' => File::exists($path),
                'lastmod' => File::exists($path) ? date('Y-m-d H:i:s', File::lastModified($path)) : null,
            ];
        }

        return $sitemaps;
    }

    /**
     * Generate all sitemaps for all active languages
     */
    public function generate()
    {
        $sitemapController = new \App\Http\Controllers\SitemapController();
        $languages = Language::where('is_active', true)->get();
        $filesGenerated = 0;

        try {
            // 1. Generate Sitemap Index
            $indexResponse = $sitemapController->index();
            File::put(public_path('sitemap.xml'), $indexResponse->getContent());
            $filesGenerated++;

            // 2. Generate language-specific sitemaps
            foreach ($languages as $language) {
                $languageResponse = $sitemapController->language($language->code);
                File::put(public_path("sitemap_{$language->code}.xml"), $languageResponse->getContent());
                $filesGenerated++;
            }

            return redirect()->back()->with('success', "Successfully generated {$filesGenerated} sitemap files for all active languages!");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to generate sitemaps: ' . $e->getMessage());
        }
    }
}
