<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name', 'course_school', 'course_study', 'course_year', 'course_description', 'course_video_url', 'course_uploader_id', 'course_video'
    ];
}
