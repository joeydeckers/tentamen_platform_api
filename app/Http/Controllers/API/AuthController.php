<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed',
            'school'=> 'required',
            'study'=> 'required',
            'rating'=> 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'course_ids' => 'required'
        ];

        $validatedData = $request->validate($rules);

        
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }else{
            $validatedData['password'] = bcrypt($request->password);
            $validatedData['course_ids'] = [];
            $user = User::create($validatedData);
            $accessToken = $user->createToken('authToken')->accessToken;
            return response(['user'=> $user, 'access_token'=> $accessToken]);
        }
        
    }
    public function login(Request $request)
    {
         $loginData = $request->validate([
             'email' => 'email|required',
             'password' => 'required'
         ]);

        
         if(!auth()->attempt($loginData)) {
             return response(['message'=>'Wachtwoord en/of email zijn niet correct']);
         }
         $accessToken = auth()->user()->createToken('authToken')->accessToken;
         return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }
}
