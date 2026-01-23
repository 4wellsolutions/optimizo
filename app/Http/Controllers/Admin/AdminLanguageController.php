<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class AdminLanguageController extends Controller
{
    /**
     * Display a listing of languages
     */
    public function index()
    {
        $languages = Language::orderBy('order')->get();
        return view('admin.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new language
     */
    public function create()
    {
        return view('admin.languages.create');
    }

    /**
     * Store a newly created language
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:10|unique:languages,code',
            'name' => 'required|string|max:100',
            'native_name' => 'required|string|max:100',
            'flag_icon' => 'nullable|string|max:50',
            'direction' => 'required|in:ltr,rtl',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Language::create([
            'code' => $request->code,
            'name' => $request->name,
            'native_name' => $request->native_name,
            'flag_icon' => $request->flag_icon,
            'is_active' => $request->has('is_active'),
            'is_default' => false,
            'direction' => $request->direction,
            'order' => $request->order ?? 999,
        ]);

        Cache::forget('languages_all');

        return redirect()->route('admin.languages.index')
            ->with('success', 'Language created successfully!');
    }

    /**
     * Show the form for editing a language
     */
    public function edit(Language $language)
    {
        return view('admin.languages.edit', compact('language'));
    }

    /**
     * Update the specified language
     */
    public function update(Request $request, Language $language)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:10|unique:languages,code,' . $language->id,
            'name' => 'required|string|max:100',
            'native_name' => 'required|string|max:100',
            'flag_icon' => 'nullable|string|max:50',
            'direction' => 'required|in:ltr,rtl',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $language->update([
            'code' => $request->code,
            'name' => $request->name,
            'native_name' => $request->native_name,
            'flag_icon' => $request->flag_icon,
            'is_active' => $request->has('is_active'),
            'direction' => $request->direction,
            'order' => $request->order ?? $language->order,
        ]);

        Cache::forget('languages_all');

        return redirect()->route('admin.languages.index')
            ->with('success', 'Language updated successfully!');
    }

    /**
     * Toggle language active status
     */
    public function toggle(Language $language)
    {
        // Prevent deactivating the default language
        if ($language->is_default && $language->is_active) {
            return redirect()->back()
                ->with('error', 'Cannot deactivate the default language!');
        }

        $language->update(['is_active' => !$language->is_active]);

        $status = $language->is_active ? 'activated' : 'deactivated';

        Cache::forget('languages_all');

        return redirect()->route('admin.languages.index')
            ->with('success', "Language {$status} successfully!");
    }

    /**
     * Set language as default
     */
    public function setDefault(Language $language)
    {
        // Remove default from all languages
        Language::where('is_default', true)->update(['is_default' => false]);

        // Set this language as default and activate it
        $language->update([
            'is_default' => true,
            'is_active' => true,
        ]);

        Cache::forget('languages_all');

        return redirect()->route('admin.languages.index')
            ->with('success', 'Default language updated successfully!');
    }

    /**
     * Remove the specified language
     */
    public function destroy(Language $language)
    {
        // Prevent deleting the default language
        if ($language->is_default) {
            return redirect()->back()
                ->with('error', 'Cannot delete the default language!');
        }

        // Prevent deleting English
        if ($language->code === 'en') {
            return redirect()->back()
                ->with('error', 'Cannot delete the English language!');
        }

        $language->delete();

        Cache::forget('languages_all');

        return redirect()->route('admin.languages.index')
            ->with('success', 'Language deleted successfully!');
    }
}
