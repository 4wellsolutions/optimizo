<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Artisan;

class AdminToolController extends Controller
{
    public function sync()
    {
        try {
            Artisan::call('db:seed', [
                '--class' => 'ToolsOnlySeeder',
                '--force' => true,
            ]);

            return redirect()->route('admin.tools.index')
                ->with('success', 'Tools synchronized successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.tools.index')
                ->with('error', 'Error syncing tools: ' . $e->getMessage());
        }
    }

    public function index()
    {
        $tools = Tool::ordered()->get();
        return view('admin.tools.index', compact('tools'));
    }

    public function edit(Tool $tool)
    {
        return view('admin.tools.edit', compact('tool'));
    }

    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'url' => 'required|string|max:255|unique:tools,url,' . $tool->id,
            'priority' => 'required|numeric|min:0|max:1',
            'change_frequency' => 'required|in:always,hourly,daily,weekly,monthly,yearly,never',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $tool->update($validated);

        return redirect()->route('admin.tools.index')
            ->with('success', 'Tool updated successfully!');
    }

    public function generateSitemap()
    {
        $tools = Tool::where('is_active', true)->get();

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Homepage
        $sitemap .= '  <url>' . PHP_EOL;
        $sitemap .= '    <loc>' . url('/') . '</loc>' . PHP_EOL;
        $sitemap .= '    <changefreq>daily</changefreq>' . PHP_EOL;
        $sitemap .= '    <priority>1.0</priority>' . PHP_EOL;
        $sitemap .= '  </url>' . PHP_EOL;

        // Tools
        foreach ($tools as $tool) {
            $sitemap .= '  <url>' . PHP_EOL;
            $sitemap .= '    <loc>' . url($tool->url) . '</loc>' . PHP_EOL;
            $sitemap .= '    <changefreq>' . $tool->change_frequency . '</changefreq>' . PHP_EOL;
            $sitemap .= '    <priority>' . $tool->priority . '</priority>' . PHP_EOL;
            $sitemap .= '    <lastmod>' . $tool->updated_at->format('Y-m-d') . '</lastmod>' . PHP_EOL;
            $sitemap .= '  </url>' . PHP_EOL;
        }

        $sitemap .= '</urlset>';

        file_put_contents(public_path('sitemap.xml'), $sitemap);

        return redirect()->route('admin.tools.index')
            ->with('success', 'Sitemap generated successfully!');
    }
}
