<?php

use App\Services\TranslationService;

if (!function_exists('__t')) {
    /**
     * Translate a model attribute
     * 
     * @param mixed $model The model instance
     * @param string $field The field to translate
     * @param string|null $locale The locale (defaults to current locale)
     * @return string|null
     */
    function __t($model, string $field, ?string $locale = null): ?string
    {
        return TranslationService::get($model, $field, $locale);
    }
}

if (!function_exists('trans_model')) {
    /**
     * Translate a model attribute (alias for __t)
     * 
     * @param mixed $model The model instance
     * @param string $field The field to translate
     * @param string|null $locale The locale (defaults to current locale)
     * @return string|null
     */
    function trans_model($model, string $field, ?string $locale = null): ?string
    {
        return TranslationService::get($model, $field, $locale);
    }
}

if (!function_exists('__tool')) {
    /**
     * Get tool-specific translation
     * 
     * @param string $toolSlug Tool slug identifier
     * @param string $key Translation key (dot notation supported)
     * @param string $default Default value if translation not found
     * @return string
     */
    function __tool(string $toolSlug, string $key, string $default = ''): string
    {
        $locale = app()->getLocale();

        // Extract category from tool slug (e.g., 'youtube-channel' -> 'youtube')
        $category = explode('-', $toolSlug)[0];

        // Try category-based file first: tools.{category}.{toolSlug}.{key}
        $categoryKey = "tools.{$category}.{$toolSlug}.{$key}";
        $translation = trans($categoryKey, [], $locale);

        // If found in category file, return it
        if ($translation !== $categoryKey) {
            return $translation;
        }

        // Fallback to monolithic file: tools.{toolSlug}.{$key}
        $legacyKey = "tools.{$toolSlug}.{$key}";
        $translation = trans($legacyKey, [], $locale);

        // Return translation or default
        return ($translation === $legacyKey) ? $default : $translation;
    }
}
