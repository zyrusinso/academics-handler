<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'avatar',
        'bg_picture',
        'price',
        'side_price',
        'star',
        'people_rate'
    ];
}
