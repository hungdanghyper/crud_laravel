<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        $validator = Validator::make($request->all(),
        [
            'email' => [
                'required',
                'email',
            ],
            'password'=>'required|min:8|max:16'

        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email is incorrect',
            'password.required' => 'Password id required',
            'password.min'  => 'Password is too short (min = 8)',
            'password.max' =>'Password is too long (max = 16)',
        ]);
        
    }
}