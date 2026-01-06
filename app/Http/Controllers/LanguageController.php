<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Language;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     */
    public function switch(Request $request, string $code)
    {
        // Validate language exists and is active
        $language = Language::where('code', $code)
            ->where('is_active', true)
            ->first();

        if (!$language) {
            return redirect()->back()->with('error', 'Language not available.');
        }

        // Store in session
        Session::put('locale', $code);

        // Get the current URL and modify it for the new locale
        $currentUrl = url()->previous();
        $newUrl = $this->replaceLocaleInUrl($currentUrl, $code);

        return redirect($newUrl)->with('success', 'Language changed successfully!');
    }

    /**
     * Replace or add locale prefix in URL
     */
    private function replaceLocaleInUrl(string $url, string $newLocale): string
    {
        $parsed = parse_url($url);
        $path = $parsed['path'] ?? '/';

        // Get all active language codes
        $languageCodes = Language::active()->pluck('code')->toArray();

        // Remove existing locale prefix if present
        $segments = explode('/', trim($path, '/'));
        if (!empty($segments) && in_array($segments[0], $languageCodes)) {
            array_shift($segments);
        }

        // Add new locale prefix (except for default language 'en')
        if ($newLocale !== 'en') {
            array_unshift($segments, $newLocale);
        }

        // Rebuild path
        $newPath = '/' . implode('/', array_filter($segments));

        // Handle query string if present
        $query = isset($parsed['query']) ? '?' . $parsed['query'] : '';

        return url($newPath . $query);
    }
}
