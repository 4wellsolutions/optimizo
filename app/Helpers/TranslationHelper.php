<?php

/**
 * DO NOT MODIFY THIS FILE UNLESS EXPLICITLY ASKED.
 * 
 * This file handles tool-specific translations by mapping each tool slug
 * directly to its corresponding category translation file.
 */

if (!function_exists('__t')) {
    /**
     * Translate a model attribute
     */
    function __t($model, string $field, ?string $locale = null): ?string
    {
        return $model->$field ?? null;
    }
}

if (!function_exists('trans_model')) {
    /**
     * Translate a model attribute (alias for __t)
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
        $toolSlug = strtolower($toolSlug);

        // Explicit Mapping: Tool Slug -> Category Translation File
        $slugToCategory = [
            // --- YOUTUBE TOOLS ---
            'youtube-tag-generator' => 'youtube',
            'youtube-tags-generator' => 'youtube',
            'youtube-channel-id-finder' => 'youtube',
            'youtube-channel-data-extractor' => 'youtube',
            'youtube-monetization-checker' => 'youtube',
            'youtube-handle-checker' => 'youtube',
            'youtube-video-tags-extractor' => 'youtube',
            'youtube-video-data-extractor' => 'youtube',
            'youtube-thumbnail-downloader' => 'youtube',
            'youtube-earnings-calculator' => 'youtube',

            // --- SEO TOOLS ---
            'yahoo-serp-checker' => 'seo',
            'bing-serp-checker' => 'seo',
            'meta-tag-analyzer' => 'seo',
            'slug-generator' => 'seo',
            'keyword-density-checker' => 'seo',
            'redirect-checker' => 'seo',
            'google-serp-checker' => 'seo',
            'broken-links-checker' => 'seo',
            'on-page-seo-checker' => 'seo',

            // --- DOCUMENT TOOLS ---
            'pdf-splitter' => 'document',
            'pdf-merger' => 'document',
            'pdf-compressor' => 'document',
            'jpg-to-pdf' => 'document',
            'pdf-to-jpg' => 'document',
            'pdf-to-ppt' => 'document',
            'ppt-to-pdf' => 'document',
            'excel-to-pdf' => 'document',
            'pdf-to-excel' => 'document',
            'word-to-pdf' => 'document',
            'pdf-to-word' => 'document',

            // --- IMAGE TOOLS ---
            'image-compressor' => 'image',
            'ico-converter' => 'image',
            'svg-to-jpg' => 'image',
            'svg-to-png' => 'image',
            'png-to-webp' => 'image',
            'base64-to-image-converter' => 'image',
            'image-to-base64-converter' => 'image',
            'heic-to-jpg-converter' => 'image',
            'webp-to-jpg-converter' => 'image',
            'jpg-to-webp-converter' => 'image',
            'png-to-jpg-converter' => 'image',
            'jpg-to-png-converter' => 'image',
            'image-converter' => 'image',

            // --- TIME TOOLS ---
            'time-unit-converter' => 'time',
            'local-time-to-utc' => 'time',
            'utc-to-local-time' => 'time',
            'date-to-unix-timestamp' => 'time',
            'unix-timestamp-to-date' => 'time',
            'epoch-time-converter' => 'time',
            'time-zone-converter' => 'time',

            // --- TEXT TOOLS ---
            'word-counter' => 'text',
            'duplicate-line-remover' => 'text',
            'file-difference-checker' => 'text',
            'text-to-morse-converter' => 'text',
            'text-reverser' => 'text',
            'morse-to-text-converter' => 'text',
            'lorem-ipsum-generator' => 'text',

            // --- UTILITY TOOLS ---
            'password-generator' => 'utilities',
            'qr-code-generator' => 'utilities',
            'random-number-generator' => 'utilities',
            'username-checker' => 'utilities',

            // --- SPREADSHEET TOOLS ---
            'csv-to-sql' => 'spreadsheet',
            'google-sheets-to-excel' => 'spreadsheet',
            'xlsx-to-xls' => 'spreadsheet',
            'xls-to-xlsx' => 'spreadsheet',
            'csv-to-excel' => 'spreadsheet',
            'excel-to-csv' => 'spreadsheet',
            'tsv-to-csv-converter' => 'spreadsheet',
            'csv-to-xml-converter' => 'spreadsheet',

            // --- DEVELOPMENT TOOLS ---
            'json-parser' => 'development',
            'xml-formatter' => 'development',
            'html-minifier' => 'development',
            'javascript-minifier' => 'development',
            'css-minifier' => 'development',
            'code-formatter' => 'development',
            'curl-command-builder' => 'development',
            'cron-job-generator' => 'development',
            'uuid-generator' => 'development',
            'md5-generator' => 'development',
            'url-encoder-decoder' => 'development',
            'unicode-encoder-decoder' => 'development',
            'jwt-decoder' => 'development',
            'base64-encoder-decoder' => 'development',
            'html-encoder-decoder' => 'development',
            'json-to-yaml-converter' => 'development',
            'json-to-xml-converter' => 'development',
            'json-to-sql-converter' => 'development',
            'markdown-to-html-converter' => 'development',
            'html-to-markdown-converter' => 'development',
            'html-viewer' => 'development',
            'json-formatter' => 'development',

            // --- CONVERTER TOOLS ---
            'frequency-converter' => 'converters',
            'molar-mass-converter' => 'converters',
            'density-converter' => 'converters',
            'torque-converter' => 'converters',
            'cooking-unit-converter' => 'converters',
            'data-transfer-rate-converter' => 'converters',
            'fuel-consumption-converter' => 'converters',
            'angle-converter' => 'converters',
            'force-converter' => 'converters',
            'power-converter' => 'converters',
            'pressure-converter' => 'converters',
            'energy-converter' => 'converters',
            'digital-storage-converter' => 'converters',
            'speed-converter' => 'converters',
            'area-converter' => 'converters',
            'volume-converter' => 'converters',
            'temperature-converter' => 'converters',
            'weight-converter' => 'converters',
            'length-converter' => 'converters',
            'number-base-converter' => 'converters',
            'decimal-octal-converter' => 'converters',
            'decimal-hex-converter' => 'converters',
            'decimal-binary-converter' => 'converters',
            'binary-hex-converter' => 'converters',
            'ascii-converter' => 'converters',
            'rgb-hex-converter' => 'converters',
            'studly-case-converter' => 'converters',
            'snake-case-converter' => 'converters',
            'sentence-case-converter' => 'converters',
            'pascal-case-converter' => 'converters',
            'kebab-case-converter' => 'converters',
            'camel-case-converter' => 'converters',
            'case-converter' => 'converters',

            // --- NETWORK TOOLS ---
            'internet-speed-test' => 'network',
            'reverse-dns-lookup' => 'network',
            'port-checker' => 'network',
            'traceroute' => 'network',
            'ping-test' => 'network',
            'whois-lookup' => 'network',
            'dns-lookup' => 'network',
            'ip-lookup' => 'network',
            'domain-to-ip' => 'network',
            'what-is-my-isp' => 'network',
            'what-is-my-ip' => 'network',
            'user-agent-parser' => 'network',
        ];

        $category = $slugToCategory[$toolSlug] ?? 'utilities';

        // Load translation from the mapped category file
        $translationKey = "{$toolSlug}.{$key}";
        $categoryFile = resource_path("lang/{$locale}/tools/{$category}.php");

        if (file_exists($categoryFile)) {
            static $loadedTranslations = [];
            if (!isset($loadedTranslations[$locale][$category])) {
                $loadedTranslations[$locale][$category] = require $categoryFile;
            }

            $translations = $loadedTranslations[$locale][$category];
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

            if ($value !== null) {
                return $value;
            }
        }

        // Fallback to English if current locale not found
        if ($locale !== 'en') {
            $enFile = resource_path("lang/en/tools/{$category}.php");
            if (file_exists($enFile)) {
                static $loadedEn = [];
                if (!isset($loadedEn[$category])) {
                    $loadedEn[$category] = require $enFile;
                }

                $translations = $loadedEn[$category];
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

                if ($value !== null) {
                    return $value;
                }
            }
        }

        return $default ?? '';
    }
}
