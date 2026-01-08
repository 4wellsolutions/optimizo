<?php

namespace App\Services;

use App\Models\Language;
use App\Models\Translation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class TranslationService
{
    /**
     * Get translation for a specific model and field
     */
    public static function get($model, string $field, ?string $locale = null): ?string
    {
        $locale = $locale ?? App::getLocale();

        // Return original if locale is default (English)
        if ($locale === 'en') {
            return $model->$field ?? null;
        }

        // Check if model matches requirements for translation (has ID)
        if (!is_object($model) || !isset($model->id)) {
            return $model->$field ?? null;
        }

        $language = Language::where('code', $locale)->first();
        if (!$language) {
            return $model->$field ?? null;
        }

        // Try to get translation from database
        $translation = Translation::where('translatable_type', get_class($model))
            ->where('translatable_id', $model->id)
            ->where('field', $field)
            ->where('language_id', $language->id)
            ->value('value');

        // Fallback to original if no translation exists
        return $translation ?? $model->$field ?? null;
    }

    /**
     * Set translation for a specific model and field
     */
    public static function set($model, string $field, string $value, string $locale): void
    {
        $language = Language::where('code', $locale)->first();
        if (!$language) {
            return;
        }

        // Check if model matches requirements for translation (has ID)
        if (!is_object($model) || !isset($model->id)) {
            return;
        }

        Translation::updateOrCreate(
            [
                'translatable_type' => get_class($model),
                'translatable_id' => $model->id,
                'field' => $field,
                'language_id' => $language->id,
            ],
            [
                'value' => $value,
            ]
        );

        // Clear cache if using caching
        self::clearCache($model, $field, $locale);
    }

    /**
     * Get all translations for a model
     */
    public static function getAll($model, string $locale): array
    {
        $language = Language::where('code', $locale)->first();
        if (!$language) {
            return [];
        }

        // Check if model matches requirements for translation (has ID)
        if (!is_object($model) || !isset($model->id)) {
            return [];
        }

        $translations = Translation::where('translatable_type', get_class($model))
            ->where('translatable_id', $model->id)
            ->where('language_id', $language->id)
            ->get();

        return $translations->pluck('value', 'field')->toArray();
    }

    /**
     * Clear translation cache
     */
    private static function clearCache($model, string $field, string $locale): void
    {
        $cacheKey = sprintf(
            'translation.%s.%s.%s.%s',
            get_class($model),
            $model->id,
            $field,
            $locale
        );
        Cache::forget($cacheKey);
    }
}
