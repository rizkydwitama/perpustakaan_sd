<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'nama'=> 'required',
            'password'=> 'required'
        ]);


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/homepage')->with('success', 'Login Berhasil!');  
        } 

        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil Logout!');
    }

}
