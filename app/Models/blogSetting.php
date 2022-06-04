<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_auto',
        'user_auto',
        'recent_limit',
        'popular_limit',
        'recent_comment_limit',
    ];
}