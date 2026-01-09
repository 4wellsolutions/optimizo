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
     * @param string|null $default Default value if translation not found
     * @return string
     */
    function __tool(string $toolSlug, string $key, ?string $default = ''): string
    {
        $locale = app()->getLocale();

        // Extract category from tool slug (e.g., 'youtube-channel' -> 'youtube')
        $category = explode('-', $toolSlug)[0];

        // Category mapping for tools that don't follow the naming convention
        $categoryMap = [
            'epoch' => 'time',
            'date' => 'time',
            'unix' => 'time',
            'local' => 'time',
            'utc' => 'time',
            'csv' => 'spreadsheet',
            'excel' => 'spreadsheet',
            'xls' => 'spreadsheet',
            'xlsx' => 'spreadsheet',
            'meta' => 'seo',
            'keyword' => 'seo',
            'word' => 'seo',
            'bing' => 'seo',
            'yahoo' => 'seo',
            'broken' => 'seo',
            'pdf' => 'seo',
            'on' => 'seo',
        ];

        // Special case: 'google' can be either spreadsheet or seo
        // Check the full tool slug to determine which category
        if ($category === 'google') {
            if (str_contains($toolSlug, 'sheets')) {
                $category = 'spreadsheet';
            } else {
                $category = 'seo';
            }
        }

        // Map category if it exists in the mapping
        if (isset($categoryMap[$category])) {
            $category = $categoryMap[$category];
        }

        // Build the translation key path: tools/{category}.{toolSlug}.{key}
        $translationKey = "{$toolSlug}.{$key}";

        // Try to load directly from category file
        $categoryFile = resource_path("lang/{$locale}/tools/{$category}.php");

        if (file_exists($categoryFile)) {
            static $loadedCategories = [];

            // Load category translations only once per request
            if (!isset($loadedCategories[$locale][$category])) {
                $categoryTranslations = require $categoryFile;
                $loadedCategories[$locale][$category] = $categoryTranslations;
            }

            // Get the translation from the loaded category
            $translations = $loadedCategories[$locale][$category];

            // Navigate through the nested array using dot notation
            $keys = explode('.', $translationKey);
            $value = $translations;

            foreach ($keys as $segment) {
                if (is_array($value) && array_key_exists($segment, $value)) {
                    $value = $value[$segment];
                } else {
                    $value = null;
                    break;
                }
            }

            // Return the translation if found, otherwise return default
            if ($value !== null && !is_array($value)) {
                return $value;
            }
        }

        // Return default if translation not found (handle null)
        return $default ?? '';
    }
}
