<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class Tool extends Model
{
    use HasFactory, HasTranslations;

    /**
     * Fields that can be translated
     */
    protected $translatable = [
        'name',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $fillable = [
        'name',
        'slug',
        'icon_svg', // SVG markup for icon
        'icon_name', // Icon identifier
        'description', // Tool short description
        'content', // Full SEO content
        'category_id', // Foreign Key (Parent ID)
        'subcategory_id', // Foreign Key (Child ID)
        'controller',
        'route_name',
        'url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
        'priority',
        'change_frequency',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'priority' => 'decimal:1',
        'order' => 'integer',
        'category_id' => 'integer',
        'subcategory_id' => 'integer',
    ];

    public function categoryRelation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategoryRelation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }
}
