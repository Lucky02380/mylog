<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class authController extends Controller
{
    function account(){
        return view('login');
    }

    function checkLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)){
            return redirect('/home');
        }
        else{
            return back()->with('error', 'Wrong Login Details');
        }

    }

    function successLogin(){
        return view('home');
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }

    function checkSignup(Request $request){
        $this->validate($request, [
            'email'   => 'required|email|unique:users',
            'password'  => 'required|min:3'
        ]);

        $user = User::create([
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        if (!$user) {
            return redirect('/signup')->with('error', 'User registration failed. Please try again.');
        }

        return redirect('/')->with('success', 'Account created successfully!');
    }
    function signup(){
        return view('signup');
    }
}
