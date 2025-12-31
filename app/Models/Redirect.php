<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $fillable = ['from_url', 'to_url', 'type', 'status', 'hits'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function incrementHits()
    {
        $this->increment('hits');
    }
}
