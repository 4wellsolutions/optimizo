<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\Language;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate sitemap index
     */
    public function index()
    {
        $languages = Language::where('is_active', true)->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($languages as $language) {
            $xml .= '<sitemap>';
            $xml .= '<loc>' . url("/sitemap_{$language->code}.xml") . '</loc>';
            $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
            $xml .= '</sitemap>';
        }

        $xml .= '</sitemapindex>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    /**
     * Generate language-specific sitemap
     */
    public function language($locale)
    {
        $language = Language::where('code', $locale)->where('is_active', true)->first();

        if (!$language) {
            abort(404);
        }

        $tools = Tool::where('is_active', true)->get();
        $urlPrefix = $locale === 'en' ? '' : "/{$locale}";

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';

        // Homepage
        $xml .= '<url>';
        $xml .= '<loc>' . url($urlPrefix . '/') . '</loc>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= $this->addAlternateLinks('/');
        $xml .= '</url>';

        // Category pages
        $categories = [
            'youtube-tools' => 'category.youtube',
            'seo-tools' => 'category.seo',
            'utility-tools' => 'category.utility',
            'network-tools' => 'category.network',
        ];

        foreach ($categories as $slug => $route) {
            $xml .= '<url>';
            $xml .= '<loc>' . url($urlPrefix . '/' . $slug) . '</loc>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= $this->addAlternateLinks('/' . $slug);
            $xml .= '</url>';
        }

        // Tool pages
        foreach ($tools as $tool) {
            $xml .= '<url>';
            $xml .= '<loc>' . url($urlPrefix . '/' . $tool->slug) . '</loc>';
            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.6</priority>';
            $xml .= $this->addAlternateLinks('/' . $tool->slug);
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    /**
     * Add alternate language links for hreflang
     */
    private function addAlternateLinks($path)
    {
        $languages = Language::where('is_active', true)->get();
        $links = '';

        foreach ($languages as $language) {
            $urlPrefix = $language->code === 'en' ? '' : "/{$language->code}";
            $links .= '<xhtml:link rel="alternate" hreflang="' . $language->code . '" href="' . url($urlPrefix . $path) . '" />';
        }

        // Add x-default (English)
        $links .= '<xhtml:link rel="alternate" hreflang="x-default" href="' . url($path) . '" />';

        return $links;
    }
}
