<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'parent_id', 'bg_gradient_from', 'bg_gradient_to', 'text_color'];

    // Removed posts() as this is now strictly for tools

    public function tools(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Tool::class);
    }

    // Removed scopeTools as all categories in this table are tools


    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function subTools(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Tool::class, 'subcategory_id');
    }
}
