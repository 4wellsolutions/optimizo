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
        $translationKey = "tools.{$toolSlug}.{$key}";
        $translation = trans($translationKey, [], $locale);
        return ($translation === $translationKey) ? $default : $translation;
    }
}
