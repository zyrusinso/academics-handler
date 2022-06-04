<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate',
        'life_program',
        'affordability',
        'social',
        
        'education_services',
        'education_services_link',
        'success_rate',
        'success_rate_link',
        'foreign_student',
        'foreign_student_link',  

        'tour_about_title',
        'tour_title',
        'tour_description',
        'list_one',
        'list_two',
        'list_three',
        'tour_image',
        'tour_link',

        'started_title',
        'started_description'
    ];

    public $timestamps = false;
}
