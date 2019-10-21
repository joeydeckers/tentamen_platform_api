<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Requested_course;
use Validator;


class RequestedCourseController extends Controller
{
    public function createRequestedCourse(Request $request){
        $rules = [
            'requested_study'=>'required',
            'university'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }


        if (Requested_course::where('requested_study', '=', $request['requested_study'])->exists() && Requested_course::where('university', '=', $request['university'])->exists()) {
            $doubleCourse = Requested_course::where('requested_study',$request['requested_study'])->where('university', $request['university'])->get();
            $id = $doubleCourse[0]->id;
            
            $course = Requested_course::find($id);

            $course->times_requested++;

            $course->save();

            return "incremented!";

        }else{
            return Requested_course::create([
                'requested_study' => $request['requested_study'],
                'university' => $request['university'],
                'times_requested' => 1
            ]);
        }



    }
}
