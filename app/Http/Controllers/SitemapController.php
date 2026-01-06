<?php

namespace App\Http\Controllers;

use App\Services\ToolData;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Display the sitemap index
     */
    public function index()
    {
        $domain = url('/');
        $categories = $this->getCategories();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Add categories sitemap
        $xml .= '<sitemap>';
        $xml .= '<loc>' . $domain . '/sitemap-categories.xml</loc>';
        $xml .= '<lastmod>' . date('c') . '</lastmod>';
        $xml .= '</sitemap>';

        // Add category-specific sitemaps
        foreach ($categories as $category) {
            $xml .= '<sitemap>';
            $xml .= '<loc>' . $domain . '/sitemap-' . $category['slug'] . '.xml</loc>';
            $xml .= '<lastmod>' . date('c') . '</lastmod>';
            $xml .= '</sitemap>';
        }

        $xml .= '</sitemapindex>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    /**
     * Display the categories sitemap
     */
    public function categories()
    {
        $domain = url('/');
        $categories = $this->getCategories();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Add homepage
        $xml .= $this->createUrlEntry($domain, date('c'), 'daily', '1.0');

        // Add each category page
        foreach ($categories as $category) {
            $loc = $domain . '/tools/' . $category['slug'];
            $xml .= $this->createUrlEntry($loc, date('c'), 'weekly', '0.9');
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    /**
     * Display a category-specific sitemap
     */
    public function category($slug)
    {
        $domain = url('/');
        $tools = $this->getToolsByCategory($slug);

        if (empty($tools)) {
            abort(404);
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($tools as $tool) {
            $loc = $domain . '/tools/' . $tool['slug'];
            $xml .= $this->createUrlEntry($loc, date('c'), 'weekly', '0.8');
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    /**
     * Get all unique categories from tools
     */
    private function getCategories()
    {
        $tools = $this->getAllTools();
        $categories = [];
        $seen = [];

        foreach ($tools as $tool) {
            $category = $tool['category'] ?? $tool['subcategory'] ?? 'Other';
            if (!isset($seen[$category])) {
                $categories[] = [
                    'name' => $category,
                    'slug' => $this->getCategorySlug($category)
                ];
                $seen[$category] = true;
            }
        }

        return $categories;
    }

    /**
     * Get tools by category
     */
    private function getToolsByCategory($categorySlug)
    {
        $tools = $this->getAllTools();
        $filtered = [];

        foreach ($tools as $tool) {
            if ($this->getCategorySlug($tool['category'] ?? $tool['subcategory'] ?? 'Other') === $categorySlug) {
                $filtered[] = $tool;
            }
        }

        return $filtered;
    }

    /**
     * Get all tools from all categories
     */
    private function getAllTools()
    {
        // Use the public getTools() method which already aggregates all tools
        return ToolData::getTools();
    }

    /**
     * Convert category name to slug
     */
    private function getCategorySlug($category)
    {
        $slugMap = [
            'Converters' => 'converters',
            'Text Tools' => 'text-tools',
            'Image Tools' => 'image-tools',
            'Document Tools' => 'document-tools',
            'YouTube Tools' => 'youtube-tools',
            'Utility Tools' => 'utility-tools',
            'Network Tools' => 'network-tools',
            'SEO Tools' => 'seo-tools',
            'Spreadsheet Tools' => 'spreadsheet-tools',
            'Time Tools' => 'time-tools',
        ];

        return $slugMap[$category] ?? strtolower(str_replace(' ', '-', $category));
    }

    /**
     * Create a URL entry for the sitemap
     */
    private function createUrlEntry($loc, $lastmod, $changefreq, $priority)
    {
        return '<url>' .
            '<loc>' . htmlspecialchars($loc) . '</loc>' .
            '<lastmod>' . $lastmod . '</lastmod>' .
            '<changefreq>' . $changefreq . '</changefreq>' .
            '<priority>' . $priority . '</priority>' .
            '</url>';
    }
}
