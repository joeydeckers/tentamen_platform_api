<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function getSpecifUser(Request $request){
        
        $user = User::findOrFail($request['id']);

        return $user;
    }
}
