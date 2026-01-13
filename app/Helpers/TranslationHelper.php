<?php



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
        // Legacy Stub: Safely return the model attribute directly.
        // File-based translation is now standard, but this ensures no errors 
        // if old code still calls __t().
        return $model->$field ?? null;
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
        return $model->$field ?? null;
    }
}

if (!function_exists('__tool')) {
    /**
     * Get tool-specific translation
     * 
     * @param string $toolSlug Tool slug identifier
     * @param string $key Translation key (dot notation supported)
     * @param string|null $default Default value if translation not found
     * @return string|array|null
     */
    function __tool(string $toolSlug, string $key, ?string $default = '')
    {
        $locale = app()->getLocale();

        // Extract category from tool slug (e.g., 'youtube-channel' -> 'youtube')
        // Normalize to lowercase to handle potential DB casing inconsistencies (e.g. 'YouTube-Tool')
        $toolSlug = strtolower($toolSlug);
        $prefix = explode('-', $toolSlug)[0];
        $category = $prefix;

        // Category mapping for tools that don't follow the naming convention
        $categoryMap = [
            // Converter tools - all use converters.php
            'angle' => 'converters',
            'area' => 'converters',
            'cooking' => 'converters',
            'data' => 'converters',
            'density' => 'converters',
            'digital' => 'converters',
            'energy' => 'converters',
            'force' => 'converters',
            'frequency' => 'converters',
            'fuel' => 'converters',
            'length' => 'converters',
            'molar' => 'converters',
            'power' => 'converters',
            'pressure' => 'converters',
            'speed' => 'converters',
            'temperature' => 'converters',
            'time' => 'converters',
            'torque' => 'converters',
            'volume' => 'converters',
            'weight' => 'converters',
            // Image tools
            'jpg' => 'image',
            'png' => 'image',
            'webp' => 'image',
            'svg' => 'image',
            'heic' => 'image',
            'ico' => 'image',
            'image' => 'image',
            'base64' => 'image',
            // Time tools
            'epoch' => 'time',
            'date' => 'time',
            'unix' => 'time',
            'local' => 'time',
            'utc' => 'time',
            // Spreadsheet tools
            'csv' => 'spreadsheet',
            'xls' => 'spreadsheet',
            'xlsx' => 'spreadsheet',
            // SEO tools
            'meta' => 'seo',
            'keyword' => 'seo',
            'bing' => 'seo',
            'yahoo' => 'seo',
            'broken' => 'seo',
            'on' => 'seo',
            // Network tools
            'dns' => 'network',
            'domain' => 'network',
            'ip' => 'network',
            'ping' => 'network',
            'port' => 'network',
            'reverse' => 'network',
            'traceroute' => 'network',
            'whois' => 'network',
            'redirect' => 'network',
            'what' => 'network',

            // Utility tools (explicit mapping)
            'text' => 'utilities',
            'binary' => 'utilities',
            'hex' => 'utilities',
            'decimal' => 'utilities',
            'morse' => 'utilities',
            'ascii' => 'utilities',
            'json' => 'utilities',
            'xml' => 'utilities',
            'sql' => 'utilities',
            'html' => 'utilities',
            'tsv' => 'utilities',
            'url' => 'utilities',
            'user' => 'utilities',
            'yaml' => 'utilities',
            'qr' => 'utilities',
            'barcode' => 'utilities',
            'color' => 'utilities',
            'password' => 'utilities',
        ];

        // 1. Check for specific tool exceptions first (Highest Priority)
        $exceptions = [
            // Utility Exceptions
            'base64-encoder-decoder' => 'utilities',
            // Document Tools
            'word-to-pdf' => 'document',
            'percentage-calculator' => 'math',
            'excel-to-pdf' => 'document',
            'pdf-to-ppt' => 'document',
            'ppt-to-pdf' => 'document',
            'jpg-to-pdf' => 'document',
            'jpeg-to-pdf' => 'document',
            'png-to-pdf' => 'document',
            'text-to-pdf' => 'document',
            // Time Tools
            'time-zone-converter' => 'time',
            'epoch-time-converter' => 'time',
            'unix-timestamp-converter' => 'time',
            // Spreadsheet Tools
            'excel-to-csv' => 'spreadsheet',
            'csv-to-excel' => 'spreadsheet',
            'excel-to-json' => 'spreadsheet',
            'json-to-excel' => 'spreadsheet',
            // Utilities
            'csv-to-xml' => 'utilities',
            'xml-to-csv' => 'utilities',
            'csv-to-json' => 'utilities',
            'json-to-csv' => 'utilities',
            // Google Tools
            'google-serp-checker' => 'seo',
            'google-sheets-to-excel' => 'spreadsheet',
        ];

        if (isset($exceptions[$toolSlug])) {
            $category = $exceptions[$toolSlug];
        }
        // 2. Check strict prefix mapping
        elseif (isset($categoryMap[$prefix])) {
            $category = $categoryMap[$prefix];
        }
        // 3. Special case: Document conversion tools pattern (pdf-*)
        elseif (str_starts_with($toolSlug, 'pdf-')) {
            $category = 'document';
        }
        // 4. Special case: 'word-' prefix usually maps to 'seo' (word-counter), 
        // unlike 'word-to-pdf' which is handled in exceptions.
        elseif ($prefix === 'word' && !isset($exceptions[$toolSlug])) {
            $category = 'seo';
        }
        // 5. Special case: 'time' prefix.
        // 'time-zone-converter' -> time (handled in exceptions)
        // 'time-converter' -> converters (unit converter)
        elseif ($prefix === 'time') {
            // If it's the generic time unit converter, it goes to converters
            // If it's specific time tools (like date calc), checking exceptions or default
            if ($toolSlug === 'time-converter' || $toolSlug === 'time-unit-converter') {
                $category = 'converters';
            } else {
                $category = 'time';
            }
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

            // Return the translation if found (allow arrays)
            if ($value !== null) {
                return $value;
            }
        }

        // Fallback: Check utilities.php if not found in specific category
        if ($category !== 'utilities') {
            $utilitiesFile = resource_path("lang/{$locale}/tools/utilities.php");

            if (file_exists($utilitiesFile)) {
                static $loadedUtilities = [];

                // Load utilities translations once
                if (!isset($loadedUtilities[$locale])) {
                    $loadedUtilities[$locale] = require $utilitiesFile;
                }

                $translations = $loadedUtilities[$locale];

                // Navigate through keys
                $keys = explode('.', $translationKey);
                $value = $translations;
                $found = true;

                foreach ($keys as $segment) {
                    if (is_array($value) && array_key_exists($segment, $value)) {
                        $value = $value[$segment];
                    } else {
                        $found = false;
                        break;
                    }
                }

                if ($found && $value !== null) {
                    return $value;
                }
            }
        }

        // Fallback: Check 'en' locale if current locale is not 'en'
        if ($locale !== 'en') {
            $enFile = resource_path("lang/en/tools/{$category}.php");

            // Try specific category file in EN
            if (file_exists($enFile)) {
                static $loadedEnCategories = [];
                if (!isset($loadedEnCategories[$category])) {
                    $loadedEnCategories[$category] = require $enFile;
                }

                $value = $loadedEnCategories[$category];
                $keys = explode('.', $translationKey);
                $found = true;

                foreach ($keys as $segment) {
                    if (is_array($value) && array_key_exists($segment, $value)) {
                        $value = $value[$segment];
                    } else {
                        $found = false;
                        break;
                    }
                }

                if ($found && $value !== null) {
                    return $value;
                }
            }

            // Try utilities.php in EN
            if ($category !== 'utilities') {
                $enUtilities = resource_path("lang/en/tools/utilities.php");
                if (file_exists($enUtilities)) {
                    static $loadedEnUtilities = null;
                    if ($loadedEnUtilities === null) {
                        $loadedEnUtilities = require $enUtilities;
                    }

                    $value = $loadedEnUtilities;
                    $keys = explode('.', $translationKey);
                    $found = true;

                    foreach ($keys as $segment) {
                        if (is_array($value) && array_key_exists($segment, $value)) {
                            $value = $value[$segment];
                        } else {
                            $found = false;
                            break;
                        }
                    }

                    if ($found && $value !== null) {
                        return $value;
                    }
                }
            }
        }

        // Return default if translation not found (handle null)
        return $default ?? '';
    }
}
