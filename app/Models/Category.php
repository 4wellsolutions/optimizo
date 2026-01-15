<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'bg_gradient_from', 'bg_gradient_to', 'text_color', 'is_active'];

    public function tools(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Tool::class);
    }
}
