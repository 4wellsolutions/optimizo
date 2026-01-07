<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class SetLocale
{
    /**
     * Handle an incoming request.
     * 
     * Locale is determined STRICTLY by URL only.
     * No session, no cache, no browser detection.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Detect locale from URL only
        $locale = $this->detectLocale($request);

        // Set application locale
        App::setLocale($locale);

        // Share with views (using cached data)
        $languages = $this->getCachedLanguages();
        $currentLanguage = $languages->firstWhere('code', $locale) ?? $languages->firstWhere('is_default', true);

        view()->share('currentLanguage', $currentLanguage);
        view()->share('availableLanguages', $languages->where('is_active', true));

        return $next($request);
    }

    /**
     * Detect the locale from URL ONLY
     */
    private function detectLocale(Request $request): string
    {
        // Get the first segment of the URL path
        $segments = $request->segments();

        if (!empty($segments)) {
            $firstSegment = $segments[0];

            // Check if first segment is a valid 2-letter language code
            if (strlen($firstSegment) === 2) {
                $languages = $this->getCachedLanguages();
                $language = $languages->where('code', $firstSegment)
                    ->where('is_active', true)
                    ->first();

                if ($language) {
                    return $language->code;
                }
            }
        }

        // No locale in URL = default language (English)
        $defaultLanguage = $this->getCachedLanguages()->firstWhere('is_default', true);
        return $defaultLanguage ? $defaultLanguage->code : 'en';
    }

    /**
     * Get languages from cache or database
     */
    private function getCachedLanguages()
    {
        return Cache::remember('languages_all', 3600, function () {
            return Language::orderBy('order')->get();
        });
    }
}
