<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        return view ('auth.login');
    }
    public function authentication(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }

        return redirect('login')->with('error', 'Login Failed');
    }

    public function logout(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
    }

    public function changePassword(){
        return view('auth.changepassword');
    }

    public function processChangePassword(Request $request){
        //cek password lama
        if(!Hash::check($request->old_password, auth()->user()->password)){
           return back()->with('error', 'kata sandi lama tidak cocok dengan kata sandi Anda saat ini');    
        }
        //cek password baru dengan repeat password
        if($request->new_password != $request->repeat_password ? $request->repeat_password : $request){
        }
        // UpdatePassword
        auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);
            return back()->with('success', 'Perubahan kata sandi sukses');
    }
} 