<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;


class UserController extends Controller
{
    //show register form
    public function signup() {
        return view('users.register');
    }

    //create new user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8'
        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        return redirect('/login')->with('message', 'User created');

}

//logout
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    $cookie = Cookie::forget('laravel_sessions');
    return redirect('/')->withCookie($cookie);

    // return redirect('/')->with('message', 'You have logged out');
}


//show login form
public function login(){
    return view('users.login');
}

//login user
public function authenticate(Request $request){
     $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
}



}