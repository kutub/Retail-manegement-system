<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){ 
        $login = $request->validate([
             'email' => 'required|string',
             'password' => 'required|string'
         ]);
 
         if(!Auth::attempt($login)){
             return response(['message' => 'Invalid login credentials.']);
         }
 
         $accessToken = Auth::user()->createToken('authToken')->accessToken;
 
         return response(['user' => Auth::user(), 'access_token' => $accessToken]);
     }
}
