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
            $tools = \App\Services\ToolData::getTools();
            $count = 0;

            foreach ($tools as $tool) {
                // Ensure slug is present as the unique key
                if (isset($tool['slug'])) {
                    Tool::updateOrCreate(
                        ['slug' => $tool['slug']],
                        $tool
                    );
                    $count++;
                }
            }

            return redirect()->route('admin.tools.index')
                ->with('success', "Synced {$count} tools successfully!");
        } catch (\Exception $e) {
            return redirect()->route('admin.tools.index')
                ->with('error', 'Error syncing tools: ' . $e->getMessage());
        }
    }

    public function build()
    {
        try {
            $basePath = base_path();
            $logPath = storage_path('logs/build.log');

            // Clear previous log
            file_put_contents($logPath, "Build started at " . now() . PHP_EOL);

            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                // Windows: Use start /B to run in background
                $command = "cd /d \"{$basePath}\" && start /B npm run build > \"{$logPath}\" 2>&1";
                pclose(popen($command, 'r'));
            } else {
                // Linux/Mac: Use nohup or & with explicit path
                // We try to find npm location if possible, otherwise rely on PATH
                $npm = 'npm';
                // Common paths for npm if not in PATH (optional/fallback)
                // $npm = '/usr/bin/npm'; 

                $command = "cd \"{$basePath}\" && {$npm} run build > \"{$logPath}\" 2>&1 &";
                exec($command);
            }

            return redirect()->route('admin.tools.index')
                ->with('success', "Build process started! Check storage/logs/build.log for details.");
        } catch (\Exception $e) {
            return redirect()->route('admin.tools.index')
                ->with('error', 'Error starting build: ' . $e->getMessage());
        }
    }

    public function index(Request $request)
    {
        $query = Tool::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        // Per page filter
        $perPage = $request->input('per_page', 20);
        if (!in_array($perPage, [10, 20, 50, 100])) {
            $perPage = 20;
        }

        $tools = $query->orderBy('id', 'desc')->paginate($perPage)->withQueryString();
        $categories = Tool::select('category')->distinct()->pluck('category');

        // Statistics Counts
        $totalTools = Tool::count();
        $activeTools = Tool::where('is_active', true)->count();
        $utilityTools = Tool::where('category', 'utility')->count();
        $youtubeTools = Tool::where('category', 'youtube')->count();

        return view('admin.tools.index', compact('tools', 'categories', 'totalTools', 'activeTools', 'utilityTools', 'youtubeTools'));
    }

    public function edit(Tool $tool)
    {
        return view('admin.tools.edit', compact('tool'));
    }

    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon_svg' => 'nullable|string',
            'icon_name' => 'nullable|string|max:255',
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
