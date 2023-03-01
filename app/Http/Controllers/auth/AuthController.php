<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view(){
        return view("admin.auth.login");
    }

    public function login(Request $request){
        // dd($request);
        $request->validate([
            'email'=>['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($request->except('_token','remember'))){
            return redirect()->route('admin.dashboard')->with('message', 'Successfully loged in');
        } else {
            return redirect()->route('admin.auth.login')->with('message', 'Invalid Combination');
        }
    }

}
