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

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($languages as $language) {
            $xml .= '  <sitemap>' . "\n";
            $xml .= '    <loc>' . url("/sitemap_{$language->code}.xml") . '</loc>' . "\n";
            $xml .= '    <lastmod>' . now()->toAtomString() . '</lastmod>' . "\n";
            $xml .= '  </sitemap>' . "\n";
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

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        // Homepage
        $xml .= '  <url>' . "\n";
        $xml .= '    <loc>' . url($urlPrefix . '/') . '</loc>' . "\n";
        $xml .= '    <changefreq>daily</changefreq>' . "\n";
        $xml .= '    <priority>1.0</priority>' . "\n";
        $xml .= '    ' . $this->addAlternateLinks('/') . "\n";
        $xml .= '  </url>' . "\n";

        // Category pages
        $categories = [
            'youtube-tools' => 'category.youtube',
            'seo-tools' => 'category.seo',
            'utility-tools' => 'category.utility',
            'network-tools' => 'category.network',
        ];

        foreach ($categories as $slug => $route) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . url($urlPrefix . '/' . $slug) . '</loc>' . "\n";
            $xml .= '    <changefreq>weekly</changefreq>' . "\n";
            $xml .= '    <priority>0.8</priority>' . "\n";
            $xml .= '    ' . $this->addAlternateLinks('/' . $slug) . "\n";
            $xml .= '  </url>' . "\n";
        }

        // Tool pages
        foreach ($tools as $tool) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . url($urlPrefix . '/tools/' . $tool->slug) . '</loc>' . "\n";
            $xml .= '    <changefreq>monthly</changefreq>' . "\n";
            $xml .= '    <priority>0.6</priority>' . "\n";
            $xml .= '    ' . $this->addAlternateLinks('/tools/' . $tool->slug) . "\n";
            $xml .= '  </url>' . "\n";
        }

        // Blog Index
        $xml .= '  <url>' . "\n";
        $xml .= '    <loc>' . url($urlPrefix . '/blog') . '</loc>' . "\n";
        $xml .= '    <changefreq>daily</changefreq>' . "\n";
        $xml .= '    <priority>0.9</priority>' . "\n";
        $xml .= '    ' . $this->addAlternateLinks('/blog') . "\n";
        $xml .= '  </url>' . "\n";

        // Blog Categories
        $blogCategories = \App\Models\BlogCategory::language($locale)->get();
        foreach ($blogCategories as $blogCategory) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . url($urlPrefix . '/blog/category/' . $blogCategory->slug) . '</loc>' . "\n";
            $xml .= '    <changefreq>weekly</changefreq>' . "\n";
            $xml .= '    <priority>0.8</priority>' . "\n";
            $xml .= '    ' . $this->addAlternateLinks('/blog/category/' . $blogCategory->slug) . "\n";
            $xml .= '  </url>' . "\n";
        }

        // Blog pages
        $posts = \App\Models\Post::published()->language($locale)->get();
        foreach ($posts as $post) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . url($urlPrefix . '/blog/' . $post->slug) . '</loc>' . "\n";
            $xml .= '    <changefreq>daily</changefreq>' . "\n";
            $xml .= '    <priority>0.7</priority>' . "\n";
            $xml .= '    ' . $this->addAlternateLinks('/blog/' . $post->slug) . "\n";
            $xml .= '  </url>' . "\n";
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
            $links .= '<xhtml:link rel="alternate" hreflang="' . $language->code . '" href="' . url($urlPrefix . $path) . '" />' . "\n      ";
        }

        // Add x-default (English)
        $links .= '<xhtml:link rel="alternate" hreflang="x-default" href="' . url($path) . '" />';

        return $links;
    }

    /**
     * Generate categories sitemap (for backward compatibility)
     */
    public function categories()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        $categories = [
            'youtube-tools' => 'YouTube Tools',
            'seo-tools' => 'SEO Tools',
            'utility-tools' => 'Utility Tools',
            'network-tools' => 'Network Tools',
        ];

        foreach ($categories as $slug => $name) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . url('/' . $slug) . '</loc>' . "\n";
            $xml .= '    <changefreq>weekly</changefreq>' . "\n";
            $xml .= '    <priority>0.8</priority>' . "\n";
            $xml .= '    ' . $this->addAlternateLinks('/' . $slug) . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    /**
     * Generate category-specific sitemap (for backward compatibility)
     */
    public function category($category)
    {
        $tools = Tool::where('is_active', true)->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        foreach ($tools as $tool) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . url('/tools/' . $tool->slug) . '</loc>' . "\n";
            $xml .= '    <changefreq>monthly</changefreq>' . "\n";
            $xml .= '    <priority>0.6</priority>' . "\n";
            $xml .= '    ' . $this->addAlternateLinks('/tools/' . $tool->slug) . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
