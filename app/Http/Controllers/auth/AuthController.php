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
        $request->validate([
            'email'=>['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($request->except('_token','remember'))){
            $request->session()->regenerate();
            return redirect(route('admin.dashboard'))->with('message', 'Successfully logged in');
        }
        return back()->withErrors(['email'=> 'Invalid credientials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        return redirect(route('login'))->with('message', 'Successfully logged out');
    }

}
