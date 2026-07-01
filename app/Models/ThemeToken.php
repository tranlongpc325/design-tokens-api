<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeToken extends Model
{
    protected $fillable = ['theme_name', 'is_active', 'tokens'];

    protected $casts = [
        'is_active' => 'boolean',
        'tokens' => 'array',
    ];
}
