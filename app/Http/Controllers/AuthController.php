<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;
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
        $nomorInduk = $request->nama;
        $pass = $request->password;
        

        if(Auth::guard('user')->attempt($credentials)){
            $request->session()->regenerate();
            
            return redirect()->intended('/homepage')->with('success', 'Login Berhasil!');  
        }else if(Auth::guard('anggota')->attempt(['nomor_induk_anggota' => $nomorInduk, 'password' => $pass])){
            $request->session()->regenerate();
            
            return redirect()->intended('/buku')->with('success', 'Login Berhasil!');  
        }
        

        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda sudah Logout!');
    }

    



}
