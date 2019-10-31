<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Course;
use Validator;
use App\User;

class CourseController extends Controller
{

     /*
        TO DO
        Make it possible to upload powerpoint and voice recording.
    */
    public function createCourse(Request $request){
        $rules = [
            'course_name'=>'required|max:55',
            'course_school'=>'required',
            'course_study'=>'required',
            'course_year'=> 'required|integer',
            'course_description'=> 'required',
            'course_video'=>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            'course_uploader_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if($request->file('course_video')){
            $filename = $request->file('course_video')->getClientOriginalName();
            $extension = File::extension($filename);
            $newName = md5($filename.time());
            $path = $request->file('course_video')->move(public_path("/upload"), $newName.".".$extension);
            $video_path = "http://127.0.0.1:8000/upload/".$newName.".".$extension;
        }
    
        return Course::create([
            'course_name' => $request['course_name'],
            'course_school' => $request['course_school'],
            'course_study' => $request['course_study'],
            'course_year' => $request['course_year'],
            'course_description' => $request['course_description'],
            //'course_video_url' => $video_path,
            'course_video_url' => 'http://techslides.com/demos/sample-videos/small.mp4',
            'course_uploader_id' => $request['course_uploader_id'],
        ]);
    }

    public function courseSearch(Request $request){
        $course = Course::where('course_school',$request['university'])->where('course_study', $request['study'])->get();
        return $course;
    }

    public function getAllCoursesBySchool($schoolname){
        $course = Course::where('course_school', '=', $schoolname)->get();
        return $course;
    }

    public function getRecentCourses(){
        $course = Course::orderBy('created_at', 'desc')->take(4)->get();
        return $course;
    }

    public function getCourse($id){
        $course = Course::findOrFail($id);
        return $course;
    }


}
