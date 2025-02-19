<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name', 'course_school', 'course_school_url', 'course_study', 'course_year', 'course_description', 'course_video_url', 'course_uploader_id', 'course_video', 'course_powerpoint_url', 'course_audio_url', 'course_summary_url', 'course_time_summary'
    ];
}
