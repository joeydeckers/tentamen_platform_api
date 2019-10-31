<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Course;

class UserController extends Controller
{
    public function getSpecifUser(Request $request){
        
        $user = User::findOrFail($request['id']);

        return $user;
    }

    public function getAllUserCourses($id){
        $userCoursesIds = User::findOrFail($id)->course_ids;
        $courses = Course::findOrFail($userCoursesIds);
        return $courses;
    }
}
