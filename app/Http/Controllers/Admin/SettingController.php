<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            // Handle file uploads
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('settings', 'public');
                $value = Storage::url($path);
            }

            Setting::set($key, $value);
        }

        return response()->json([
            'success' => true,
            'message' => 'Settings updated successfully!'
        ]);
    }
    public function generateSitemap()
    {
        try {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

            // 1. Static Pages
            $staticPages = [
                route('home'),
                route('about'),
                route('contact'),
                route('category.youtube'),
                route('category.seo'),
                route('category.utility'),
                route('category.network'),
                // Add legal pages if needed
                route('terms'),
                route('privacy'),
            ];

            foreach ($staticPages as $pageUrl) {
                $xml .= '<url>';
                $xml .= '<loc>' . $pageUrl . '</loc>';
                $xml .= '<changefreq>weekly</changefreq>';
                $xml .= '<priority>0.8</priority>';
                $xml .= '</url>';
            }

            // 2. Dynamic Tools
            $tools = \App\Models\Tool::where('is_active', true)->get();

            foreach ($tools as $tool) {
                // Ensure the route exists before adding
                if (\Illuminate\Support\Facades\Route::has($tool->route_name)) {
                    $xml .= '<url>';
                    $xml .= '<loc>' . route($tool->route_name) . '</loc>';
                    $xml .= '<changefreq>' . ($tool->change_frequency ?? 'weekly') . '</changefreq>';
                    $xml .= '<priority>' . ($tool->priority ?? '0.8') . '</priority>';
                    $xml .= '</url>';
                }
            }

            $xml .= '</urlset>';

            // Write to public folder
            file_put_contents(public_path('sitemap.xml'), $xml);

            return response()->json([
                'success' => true,
                'message' => 'Sitemap generated successfully! (' . (count($staticPages) + $tools->count()) . ' URLs)'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error generating sitemap: ' . $e->getMessage()
            ], 500);
        }
    }
    public function cache()
    {
        return view('admin.settings.cache');
    }

    public function clearCache(Request $request)
    {
        $type = $request->input('type');

        try {
            switch ($type) {
                case 'optimize':
                    Artisan::call('optimize:clear');
                    $message = 'All caches cleared and optimized!';
                    break;
                case 'application':
                    Artisan::call('cache:clear');
                    $message = 'Application cache cleared!';
                    break;
                case 'route':
                    Artisan::call('route:clear');
                    $message = 'Route cache cleared!';
                    break;
                case 'config':
                    Artisan::call('config:clear');
                    $message = 'Configuration cache cleared!';
                    break;
                case 'view':
                    Artisan::call('view:clear');
                    $message = 'View cache cleared!';
                    break;
                default:
                    return response()->json(['success' => false, 'message' => 'Invalid cache type'], 400);
            }

            return response()->json(['success' => true, 'message' => $message]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
