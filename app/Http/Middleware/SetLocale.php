<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Priority order for locale detection:
        // 1. URL segment (e.g., /ru/tools)
        // 2. Session stored locale
        // 3. Browser Accept-Language header
        // 4. Default language

        $locale = $this->detectLocale($request);

        // Validate locale against active languages
        $language = Language::where('code', $locale)->where('is_active', true)->first();

        if (!$language) {
            $language = Language::getDefault();
            $locale = $language->code;
        }

        // Set application locale
        App::setLocale($locale);

        // Store in session for persistence
        Session::put('locale', $locale);

        // Share with views
        view()->share('currentLanguage', $language);
        view()->share('availableLanguages', Language::active()->orderBy('order')->get());

        return $next($request);
    }

    /**
     * Detect the locale from various sources
     */
    private function detectLocale(Request $request): string
    {
        // 1. Check URL segment (first segment after domain)
        $segments = $request->segments();
        if (!empty($segments)) {
            $firstSegment = $segments[0];
            // Check if first segment is a valid language code (2 letters)
            if (strlen($firstSegment) === 2 && Language::where('code', $firstSegment)->where('is_active', true)->exists()) {
                return $firstSegment;
            }
        }

        // 2. Check session
        if (Session::has('locale')) {
            $sessionLocale = Session::get('locale');
            if (Language::where('code', $sessionLocale)->where('is_active', true)->exists()) {
                return $sessionLocale;
            }
        }

        // 3. Check browser Accept-Language header
        $browserLocale = $request->getPreferredLanguage(
            Language::active()->pluck('code')->toArray()
        );
        if ($browserLocale && Language::where('code', $browserLocale)->where('is_active', true)->exists()) {
            return $browserLocale;
        }

        // 4. Return default language
        $defaultLanguage = Language::getDefault();
        return $defaultLanguage ? $defaultLanguage->code : 'en';
    }
}
