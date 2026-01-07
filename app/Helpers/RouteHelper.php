<?php

if (!function_exists('localeRoute')) {
    /**
     * Generate a locale-aware route URL with path prefix
     * 
     * Examples:
     * - localeRoute('home') when locale=ru → /ru/
     * - localeRoute('tools.dns-lookup') when locale=ru → /ru/tools/dns-lookup
     * - localeRoute('home') when locale=en → /
     *
     * @param string $name Route name
     * @param array $parameters Route parameters
     * @param string|null $locale Locale code (defaults to current locale)
     * @return string
     */
    function localeRoute(string $name, array $parameters = [], ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $fallbackLocale = config('app.fallback_locale', 'en');

        // For default locale (en), generate route without locale prefix
        if ($locale === $fallbackLocale) {
            return route($name, $parameters);
        }

        // For non-default locales, get the base route and prepend locale
        // Using false as third parameter returns relative path without domain
        $path = route($name, $parameters, false);

        // Prepend locale to the path
        // If path is just '/', return '/ru/'
        // If path is '/tools/dns-lookup', return '/ru/tools/dns-lookup'
        if ($path === '/') {
            return '/' . $locale . '/';
        }

        return '/' . $locale . $path;
    }
}
