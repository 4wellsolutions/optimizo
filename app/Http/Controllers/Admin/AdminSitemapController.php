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
        $sitemapPath = public_path('sitemap.xml');
        $sitemapExists = File::exists($sitemapPath);
        $lastGenerated = $sitemapExists ? date('F j, Y H:i:s', File::lastModified($sitemapPath)) : 'Never';
        $sitemapUrl = url('sitemap.xml');

        return view('admin.sitemap.index', compact('sitemapExists', 'lastGenerated', 'sitemapUrl'));
    }

    public function generate()
    {
        $domain = url('/');
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // 1. Homepage
        $xml .= $this->createUrlEntry($domain, date('c'), 'daily', '1.0');

        // 2. Tools
        $tools = Tool::active()->get();
        foreach ($tools as $tool) {
            // Ensure URL is absolute. If stored as relative /tools/slug, append domain.
            // If stored as full URL, use as is.
            $loc = $tool->url;
            if (!str_starts_with($loc, 'http')) {
                $loc = rtrim($domain, '/') . '/' . ltrim($loc, '/');
            }

            $lastmod = $tool->updated_at ? $tool->updated_at->toIso8601String() : date('c');
            $priority = $tool->priority ?? '0.8';
            $freq = $tool->change_frequency ?? 'weekly';

            $xml .= $this->createUrlEntry($loc, $lastmod, $freq, $priority);
        }

        $xml .= '</urlset>';

        // Save to public folder
        File::put(public_path('sitemap.xml'), $xml);

        return redirect()->back()->with('success', 'Sitemap generated successfully! ' . $tools->count() . ' tools added.');
    }

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
