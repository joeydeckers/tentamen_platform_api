<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('askforcourse', 'API\RequestedCourseController@createRequestedCourse');
Route::get('getrequestedcourses/{university}', 'API\RequestedCourseController@getRequestedCourses');

Route::get('courses/{university}/{study}', 'API\CourseController@courseSearch');


Route::get('user/{id}/courses', 'API\UserController@getAllUserCourses');
Route::post('register', 'API\AuthController@register');
Route::post('login', 'API\AuthController@login');
Route::get('user/{id}', 'API\UserController@getSpecifUser');

Route::get('course/recent', 'API\CourseController@getRecentCourses');
Route::post('courses/create', 'API\CourseController@createCourse');
Route::get('courses/getcoursesbyschool/{schoolname}', 'API\CourseController@getAllCoursesBySchool');
Route::get('cursus/{id}', 'API\CourseController@getCourse');


