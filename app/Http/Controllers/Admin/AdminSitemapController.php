<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminSitemapController extends Controller
{
    public function index()
    {
        $domain = url('/');

        // Get sitemap statistics
        $sitemaps = $this->getSitemapStatistics($domain);

        // Legacy single sitemap info
        $sitemapPath = public_path('sitemap.xml');
        $sitemapExists = File::exists($sitemapPath);
        $lastGenerated = $sitemapExists ? date('F j, Y H:i:s', File::lastModified($sitemapPath)) : 'Never';
        $sitemapUrl = url('sitemap.xml');

        $urlCount = 0;
        if ($sitemapExists) {
            $xmlContent = File::get($sitemapPath);
            $urlCount = substr_count($xmlContent, '<loc>');
        }

        return view('admin.sitemap.index', compact('sitemaps', 'sitemapExists', 'lastGenerated', 'sitemapUrl', 'urlCount'));
    }

    /**
     * Get statistics for all sitemaps
     */
    private function getSitemapStatistics($domain)
    {
        $sitemaps = [];

        // Get all tools and group by category
        $toolsByCategory = $this->getToolsByCategory();

        // Sitemap Index
        $indexPath = public_path('sitemap.xml');
        $indexCount = File::exists($indexPath) ? substr_count(File::get($indexPath), '<sitemap>') : count($toolsByCategory) + 1;
        $sitemaps[] = [
            'name' => 'Sitemap Index',
            'url' => $domain . '/sitemap.xml',
            'type' => 'index',
            'count' => $indexCount,
            'exists' => File::exists($indexPath),
            'lastmod' => File::exists($indexPath) ? date('Y-m-d H:i:s', File::lastModified($indexPath)) : null,
        ];

        // Categories Sitemap
        $categoriesPath = public_path('sitemap-categories.xml');
        $categoriesCount = File::exists($categoriesPath) ? substr_count(File::get($categoriesPath), '<url>') : count($toolsByCategory) + 1;
        $sitemaps[] = [
            'name' => 'Categories',
            'url' => $domain . '/sitemap-categories.xml',
            'type' => 'categories',
            'count' => $categoriesCount,
            'exists' => File::exists($categoriesPath),
            'lastmod' => File::exists($categoriesPath) ? date('Y-m-d H:i:s', File::lastModified($categoriesPath)) : null,
        ];

        // Category-specific sitemaps
        foreach ($toolsByCategory as $category => $tools) {
            $slug = $this->getCategorySlug($category);
            $categoryPath = public_path('sitemap-' . $slug . '.xml');
            $categoryCount = File::exists($categoryPath) ? substr_count(File::get($categoryPath), '<url>') : count($tools);

            $sitemaps[] = [
                'name' => $category,
                'url' => $domain . '/sitemap-' . $slug . '.xml',
                'type' => 'category',
                'count' => $categoryCount,
                'exists' => File::exists($categoryPath),
                'lastmod' => File::exists($categoryPath) ? date('Y-m-d H:i:s', File::lastModified($categoryPath)) : null,
            ];
        }

        return $sitemaps;
    }

    /**
     * Get all tools grouped by category
     */
    private function getToolsByCategory()
    {
        // Use the public getTools() method which already aggregates all tools
        $allTools = \App\Services\ToolData::getTools();

        $grouped = [];
        foreach ($allTools as $tool) {
            $category = $tool['category'] ?? $tool['subcategory'] ?? 'Other';
            if (!isset($grouped[$category])) {
                $grouped[$category] = [];
            }
            $grouped[$category][] = $tool;
        }

        return $grouped;
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
            'utility' => 'utility',
            'network' => 'network',
            'youtube' => 'youtube',
            'seo' => 'seo',
            'spreadsheet' => 'spreadsheet',
            'document' => 'document',
            'text' => 'text',
        ];

        return $slugMap[$category] ?? strtolower(str_replace(' ', '-', $category));
    }

    public function generate()
    {
        $domain = url('/');
        $sitemapController = new \App\Http\Controllers\SitemapController();
        $filesGenerated = 0;

        // 1. Generate Sitemap Index
        $indexResponse = $sitemapController->index();
        File::put(public_path('sitemap.xml'), $indexResponse->getContent());
        $filesGenerated++;

        // 2. Generate Categories Sitemap
        $categoriesResponse = $sitemapController->categories();
        File::put(public_path('sitemap-categories.xml'), $categoriesResponse->getContent());
        $filesGenerated++;

        // 3. Generate Category-Specific Sitemaps - Get actual categories from tools
        $toolsByCategory = $this->getToolsByCategory();

        foreach ($toolsByCategory as $category => $tools) {
            if (empty($tools)) {
                continue; // Skip empty categories
            }

            try {
                $slug = $this->getCategorySlug($category);
                $categoryResponse = $sitemapController->category($slug);
                File::put(public_path('sitemap-' . $slug . '.xml'), $categoryResponse->getContent());
                $filesGenerated++;
            } catch (\Exception $e) {
                // Skip if error
                continue;
            }
        }

        return redirect()->back()->with('success', 'All sitemaps generated successfully! ' . $filesGenerated . ' XML files created.');
    }

}
