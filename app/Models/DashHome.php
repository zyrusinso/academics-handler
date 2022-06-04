<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashHome extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'url',
        'video_link',
        'contact_num',
        'contact_email'
    ];
}
