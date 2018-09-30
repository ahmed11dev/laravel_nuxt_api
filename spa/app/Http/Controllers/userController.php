<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class userController extends Controller{
    public function signup(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
        $user->save();
        return response()->json(['message' => 'user are created'],201);
        
    }
    
    public function signin(Request $request){
         $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email','password');
        try{
                if(!$token = JWTAuth::attempt($credentials) ){
                   return response()->json(['error' => 'invaled user or password'],401);
                }

        }catch(JWTException $e){
                  return response()->json(['error' => 'could not create a token'],500);

        }
        return response()->json(['token' => $token],200);

    }

}