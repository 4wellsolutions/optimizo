<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    /**
     * Display a listing of the categories.
     */
    public function index(Request $request)
    {
        $query = Category::with('parent')
            ->withCount(['tools', 'subTools']);

        // Search Filter
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Parent Filter
        if ($request->has('parent_id') && $request->input('parent_id') != '') {
            $parentId = $request->input('parent_id');
            if ($parentId == 'top') {
                $query->whereNull('parent_id');
            } else {
                $query->where('parent_id', $parentId);
            }
        }

        $categories = $query->latest()->paginate(20);

        // Fetch potential parents for the filter dropdown
        $parents = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('admin.tools.categories.index', compact('categories', 'parents'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        // Fetch potential parents for the dropdown
        $parents = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('admin.tools.categories.create', compact('parents'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'bg_gradient_from' => 'nullable|string|max:7',
            'bg_gradient_to' => 'nullable|string|max:7',
            'text_color' => 'nullable|string|max:50',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            // Ensure slug is unique if generated
            $count = Category::where('slug', $validated['slug'])->count();
            if ($count > 0) {
                $validated['slug'] .= '-' . ($count + 1);
            }
        }

        Category::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'category' => Category::latest()->first()
            ]);
        }

        return redirect()->route('admin.tools.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        $parents = Category::whereNull('parent_id')
            ->where('id', '!=', $category->id)
            ->orderBy('name')
            ->get();

        return view('admin.tools.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'bg_gradient_from' => 'nullable|string|max:7',
            'bg_gradient_to' => 'nullable|string|max:7',
            'text_color' => 'nullable|string|max:50',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        if ($validated['parent_id'] == $category->id) {
            return back()->with('error', 'Category cannot be its own parent.');
        }

        $category->update($validated);

        return redirect()->route('admin.tools.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Check for child categories
        if ($category->children()->count() > 0) {
            return back()->with('error', 'Cannot delete category with subcategories. Delete them first.');
        }

        // Check for associated tools
        if ($category->tools()->count() > 0) {
            return back()->with('error', 'Cannot delete category with associated tools.');
        }

        $category->delete();

        return redirect()->route('admin.tools.categories.index')
            ->with('success', 'Category deleted successfully.');
    }

}
