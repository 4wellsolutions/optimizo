<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use RecursiveRegexIterator;

class AdminTranslationReportController extends Controller
{
    public function index(Request $request)
    {
        $langPath = resource_path('lang');
        $allLocales = $this->getAllLocales($langPath);

        // Get selected languages from request or default to all
        $selectedLanguages = $request->input('languages', []);

        // Always include 'en' as it's the reference
        $localesToProcess = [];
        if (empty($selectedLanguages)) {
            $locales = array_filter(glob($langPath . '/*'), 'is_dir');
        } else {
            // Keep english + selected
            $locales = [];

            // Always check english path
            if (is_dir($langPath . '/en')) {
                $locales[] = $langPath . '/en';
            }

            foreach ($selectedLanguages as $lang) {
                if ($lang !== 'en' && in_array($lang, $allLocales)) {
                    if (is_dir($langPath . '/' . $lang)) {
                        $locales[] = $langPath . '/' . $lang;
                    }
                }
            }
        }

        $englishKeys = $this->loadAllKeys($langPath . '/en', $langPath, 'en');
        $allLocalesData = [];

        // Reference Data (English)
        $allLocalesData['en'] = ['files' => []];
        foreach ($englishKeys as $fileName => $keys) {
            $allLocalesData['en']['files'][$fileName] = count($keys);
        }

        // Compare others
        foreach ($locales as $localeDir) {
            $locale = basename($localeDir);
            if ($locale === 'en')
                continue;

            $localeKeys = $this->loadAllKeys($localeDir, $langPath, $locale);
            $allLocalesData[$locale] = ['files' => []];

            foreach ($englishKeys as $fileName => $refKeys) {
                $translated = 0;

                // Handle main locale file naming (en.json vs de.json)
                $targetFileName = $fileName;
                if ($fileName === 'en.json') {
                    $targetFileName = $locale . '.json';
                }

                if (isset($localeKeys[$targetFileName])) {
                    foreach ($refKeys as $key) {
                        if (in_array($key, $localeKeys[$targetFileName])) {
                            $translated++;
                        }
                    }
                }
                $allLocalesData[$locale]['files'][$fileName] = $translated;
            }
        }

        $sortedLocaleCodes = array_keys($allLocalesData);
        sort($sortedLocaleCodes);

        return view('admin.languages.report', compact('englishKeys', 'allLocalesData', 'sortedLocaleCodes', 'allLocales', 'selectedLanguages'));
    }

    private function getAllLocales($langPath)
    {
        $locales = array_filter(glob($langPath . '/*'), 'is_dir');
        $codes = [];
        foreach ($locales as $localeDir) {
            $codes[] = basename($localeDir);
        }
        sort($codes);
        return $codes;
    }

    private function getKeysRecursive($array, $prefix = '')
    {
        $keys = [];
        foreach ($array as $key => $value) {
            $fullKey = $prefix . ($prefix ? '.' : '') . $key;
            if (is_array($value)) {
                $keys = array_merge($keys, $this->getKeysRecursive($value, $fullKey));
            } else {
                $keys[] = $fullKey;
            }
        }
        return $keys;
    }

    private function loadAllKeys($localeDir, $langPath, $locale)
    {
        $allKeys = [];

        // Main JSON
        $mainJson = $langPath . '/' . $locale . '.json';
        if (file_exists($mainJson)) {
            $content = json_decode(file_get_contents($mainJson), true) ?? [];
            $allKeys[$locale . '.json'] = $this->getKeysRecursive($content);
        }

        // Sub directories
        if (is_dir($localeDir)) {
            $directory = new RecursiveDirectoryIterator($localeDir);
            $iterator = new RecursiveIteratorIterator($directory);
            $jsonFiles = new RegexIterator($iterator, '/^.+\.json$/i', RecursiveRegexIterator::GET_MATCH);

            foreach ($jsonFiles as $file) {
                $filePath = $file[0];
                $relativePath = str_replace($localeDir . DIRECTORY_SEPARATOR, '', $filePath);
                $allKeys[$relativePath] = $this->getKeysRecursive(json_decode(file_get_contents($filePath), true) ?? []);
            }
        }

        return $allKeys;
    }
}
