<?php

namespace App\Traits;

use App\Models\Translation;
use App\Services\TranslationService;

trait HasTranslations
{
    /**
     * Get translation for a specific field
     */
    public function translate(string $field, ?string $locale = null): ?string
    {
        return TranslationService::get($this, $field, $locale);
    }

    /**
     * Set translation for a specific field
     */
    public function setTranslation(string $field, string $value, string $locale): void
    {
        TranslationService::set($this, $field, $value, $locale);
    }

    /**
     * Get all translations for this model
     */
    public function getTranslations(string $locale): array
    {
        return TranslationService::getAll($this, $locale);
    }

    /**
     * Get the translations relationship
     */
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    /**
     * Magic getter for translated attributes
     * Usage: $tool->name_ru or $tool->description_ru
     */
    public function __get($key)
    {
        // Check if attribute ends with language code (e.g., name_ru)
        if (preg_match('/^(.+)_([a-z]{2})$/', $key, $matches)) {
            $field = $matches[1];
            $locale = $matches[2];

            if ($this->isFillable($field) || in_array($field, $this->translatable ?? [])) {
                return $this->translate($field, $locale);
            }
        }

        return parent::__get($key);
    }
}
