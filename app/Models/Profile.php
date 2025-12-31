<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'tagline',
        'bio',
        'photo',
        'resume_file',
        'email',
        'github',
        'linkedin',
        'instagram',
    ];
}