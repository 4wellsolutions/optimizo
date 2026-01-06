<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Translation extends Model
{
    protected $fillable = [
        'language_id',
        'translatable_type',
        'translatable_id',
        'field',
        'value',
    ];

    /**
     * Get the language that owns the translation
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Get the owning translatable model
     */
    public function translatable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get translation value for a specific model, field, and language
     */
    public static function getValue(string $type, int $id, string $field, int $languageId): ?string
    {
        return static::where('translatable_type', $type)
            ->where('translatable_id', $id)
            ->where('field', $field)
            ->where('language_id', $languageId)
            ->value('value');
    }
}
