<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'price',
        'image',
        'avatar',
        'sub_price',
        'rate',
        'num_rate'
    ];

    public function Image(){
        $imagePath = ($this->image)? $this->image : 'default/ImageDefault.png';

        return '/storage/' .$imagePath;
    }

    public function Avatar(){
        $avatarPath = ($this->avatar)? $this->avatar : 'default/AvatarDefault.png';

        return '/storage/' .$avatarPath;
    }
}
