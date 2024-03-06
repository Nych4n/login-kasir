<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showlogin(){
        return view('login');
    }

    public function login(Request $request){
        $login = $request->validate([
           'username' => 'required', 
           'password' => 'required|min:6', 
        ]);
        if(Auth::attempt($login)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }else{
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}