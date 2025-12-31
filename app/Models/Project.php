<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'featured_image',
        'gallery',
        'tech_stack',
        'live_url',
        'github_url',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'gallery' => 'array',
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
    ];
}