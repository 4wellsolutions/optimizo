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
            // Use legacy array data for syncing from code to DB
            $tools = \App\Services\ToolData::getInitialToolsData();
            $count = 0;

            foreach ($tools as $toolData) {
                // Ensure slug is present as the unique key
                if (isset($toolData['slug'])) {

                    // Resolve Category ID
                    $categoryId = null;
                    $subcategoryId = null;

                    if (isset($toolData['category'])) {
                        $catSlug = $toolData['category'];
                        $parent = \App\Models\Category::where('slug', $catSlug)->whereNull('parent_id')->first();

                        if ($parent) {
                            $categoryId = $parent->id;

                            // Check for subcategory
                            if (!empty($toolData['subcategory'])) {
                                $subSlug = \Illuminate\Support\Str::slug($catSlug . '-' . $toolData['subcategory']);
                                $child = \App\Models\Category::where('slug', $subSlug)
                                    ->where('parent_id', $parent->id)
                                    ->first();

                                if ($child) {
                                    $subcategoryId = $child->id;
                                }
                            }
                        }
                    }

                    // Add IDs to data
                    $toolData['category_id'] = $categoryId;
                    $toolData['subcategory_id'] = $subcategoryId;

                    // Filter out legacy fields that were removed from the database
                    $validFields = [
                        'name',
                        'slug',
                        'icon_svg',
                        'icon_name',
                        'description',
                        'category_id',
                        'subcategory_id',
                        'controller',
                        'route_name',
                        'url',
                        'is_active',
                        'priority',
                        'change_frequency',
                        'order'
                    ];

                    $dataToSync = \Illuminate\Support\Arr::only($toolData, $validFields);

                    Tool::updateOrCreate(
                        ['slug' => $toolData['slug']],
                        $dataToSync
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
            $val = $request->input('category');
            if (is_numeric($val)) {
                $query->where('category_id', $val);
            } else {
                $query->where('category', $val);
            }
        }

        if ($request->filled('subcategory')) {
            $query->where('subcategory_id', $request->input('subcategory'));
        }

        // Per page filter
        $perPage = $request->input('per_page', 20);
        if (!in_array($perPage, [10, 20, 50, 100])) {
            $perPage = 20;
        }

        $tools = $query->orderBy('id', 'desc')
            ->with(['categoryRelation', 'subcategoryRelation'])
            ->paginate($perPage)
            ->withQueryString();

        // Fetch unique categories used by tools (via relation)
        // Since we now store category_id, we should fetch Category models.
        // Or simply fetch all categories for the filter dropdown?
        // Or simply fetch all categories for the filter dropdown?
        // Let's fetch all categories that are parents.
        $categories = \App\Models\Category::whereNull('parent_id')->orderBy('name')->get();
        $subcategories = \App\Models\Category::whereNotNull('parent_id')->orderBy('name')->get();
        // Or if we want ONLY categories that are actually used:
        // $usedCategoryIds = Tool::distinct()->pluck('category_id');
        // $categories = Category::whereIn('id', $usedCategoryIds)->get();
        // But usually filter dropdowns show all available options or at least all parents.
        // The original code was `Tool::select('category')->distinct()...` which implies "existing categories".
        // Let's stick to showing all parent categories for filtering.

        // Statistics Counts
        $totalTools = Tool::count();
        $activeTools = Tool::where('is_active', true)->count();
        // Count by new category_id mechanism. 
        // We need to look up IDs for 'utility' and 'youtube' if we want to keep these specific counts.
        $utilityCat = \App\Models\Category::where('slug', 'utility')->first();
        $youtubeCat = \App\Models\Category::where('slug', 'youtube')->first();

        $utilityTools = $utilityCat ? Tool::where('category_id', $utilityCat->id)->count() : 0;
        $youtubeTools = $youtubeCat ? Tool::where('category_id', $youtubeCat->id)->count() : 0;

        return view('admin.tools.index', compact('tools', 'categories', 'subcategories', 'totalTools', 'activeTools', 'utilityTools', 'youtubeTools'));
    }

    public function edit(Tool $tool)
    {
        $categories = \App\Models\Category::whereNull('parent_id')->orderBy('name')->get();
        $subcategories = \App\Models\Category::whereNotNull('parent_id')->with('parent')->orderBy('name')->get();

        return view('admin.tools.edit', compact('tool', 'categories', 'subcategories'));
    }

    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon_svg' => 'nullable|string',
            'icon_name' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:categories,id',
            'url' => 'required|string|max:255|unique:tools,url,' . $tool->id,
            'priority' => 'required|numeric|min:0|max:1',
            'change_frequency' => 'required|in:always,hourly,daily,weekly,monthly,yearly,never',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Sync legacy category string
        $category = \App\Models\Category::find($validated['category_id']);
        if ($category) {
            $validated['category'] = $category->slug;
        }

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
