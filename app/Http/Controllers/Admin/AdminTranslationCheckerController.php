<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use RecursiveRegexIterator;

class AdminTranslationCheckerController extends Controller
{
    public function index(Request $request)
    {
        $langPath = resource_path('lang');
        $allLocales = $this->getAllLocales($langPath);

        // Get selected languages from request or default to a few for performance
        $selectedLanguages = $request->input('languages', ['da', 'de', 'es', 'fr']);

        // Always include 'en' as it's the reference
        if (!in_array('en', $selectedLanguages)) {
            array_unshift($selectedLanguages, 'en');
        }

        $englishKeysWithValues = $this->loadAllKeysWithValues($langPath . '/en', $langPath, 'en');

        $comparisonData = [];

        // Load data for all selected languages
        foreach ($selectedLanguages as $locale) {
            if ($locale === 'en') {
                $comparisonData['en'] = $englishKeysWithValues;
                continue;
            }

            $localeDir = $langPath . '/' . $locale;
            $comparisonData[$locale] = $this->loadAllKeysWithValues($localeDir, $langPath, $locale);
        }

        // Flatten English data to get all unique keys across all files
        $allFilesKeys = [];
        foreach ($englishKeysWithValues as $fileName => $keys) {
            $allFilesKeys[$fileName] = array_keys($keys);
        }

        return view('admin.languages.checker', compact('allFilesKeys', 'comparisonData', 'selectedLanguages', 'allLocales'));
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

    private function loadAllKeysWithValues($localeDir, $langPath, $locale)
    {
        $allData = [];

        // Main JSON
        $mainJson = $langPath . '/' . $locale . '.json';
        if (file_exists($mainJson)) {
            $content = json_decode(file_get_contents($mainJson), true) ?? [];
            $allData[$locale . '.json'] = $this->flattenArray($content);
        } else if ($locale !== 'en') {
            // If main JSON doesn't exist for this locale, use empty
            $allData[$locale . '.json'] = [];
        } else {
            // For English, we might name it en.json
            $allData['en.json'] = [];
        }

        // Sub directories
        if (is_dir($localeDir)) {
            $directory = new RecursiveDirectoryIterator($localeDir);
            $iterator = new RecursiveIteratorIterator($directory);
            $jsonFiles = new RegexIterator($iterator, '/^.+\.json$/i', RecursiveRegexIterator::GET_MATCH);

            foreach ($jsonFiles as $file) {
                $filePath = $file[0];
                $relativePath = str_replace($localeDir . DIRECTORY_SEPARATOR, '', $filePath);

                // For comparison, we want the relative path to be the same across languages
                // E.g. tools/email.json should be the key
                $allData[$relativePath] = $this->flattenArray(json_decode(file_get_contents($filePath), true) ?? []);
            }
        }

        return $allData;
    }

    private function flattenArray($array, $prefix = '')
    {
        $result = [];
        foreach ($array as $key => $value) {
            $fullKey = $prefix . ($prefix ? '.' : '') . $key;
            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value, $fullKey));
            } else {
                $result[$fullKey] = $value;
            }
        }
        return $result;
    }
}
