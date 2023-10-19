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

    public function resetToken(string $token) {
        return view('auth.resetpassword', ['token' => $token]);
    }

    public function forgotPassword() {
        return view('auth.forgotpassword');
    }

    public function updatePassword (Request $request) {
        $request->validate(['email' => 'required|email']);
        Alert::success('We have emailed your password reset link.');
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user,$password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
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