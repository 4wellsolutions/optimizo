<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'subcategory',
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
    ];

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
