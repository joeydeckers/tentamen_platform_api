<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requested_course extends Model
{
    protected $fillable = [
        'requested_study', 'university', 'times_requested'
    ];
}
