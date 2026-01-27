<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Media extends Model
{
    protected $fillable = [
        'filename',
        'original_name',
        'mime_type',
        'size',
        'path',
        'url',
        'alt_text',
        'caption',
        'user_id'
    ];

    protected $appends = ['url'];

    public function getUrlAttribute($value)
    {
        if ($value && Str::startsWith($value, ['http://', 'https://', '/'])) {
            return $value;
        }

        if (Str::startsWith($this->path, 'images/')) {
            return asset($this->path);
        }

        // For legacy paths that might already start with /storage/ or storage/
        if (Str::startsWith($this->path, ['/storage/', 'storage/'])) {
            return asset(ltrim($this->path, '/'));
        }

        return asset('storage/' . $this->path);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeImages($query)
    {
        return $query->where('mime_type', 'like', 'image/%');
    }

    public function scopeDocuments($query)
    {
        return $query->whereNotIn('mime_type', ['image/%']);
    }
}
