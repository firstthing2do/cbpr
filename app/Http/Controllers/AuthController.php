<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use illuminate\Support\Str;

class AuthController extends Controller
{
   public function showLoginForm()
   {
       return view('auth.login');
   }
    public function showRegisterForm()
    {
         return view('auth.register');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $users = User::where('email', $credentials['email'])->first();
        if($users && $users->password == $credentials['password']){
            Auth::login($users);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login successful');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout successful');
    }
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|max:255'
        ]);
        $token = Str::random(60);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'verication_token' => $token,
        ]);
        Mail::to($user->email)->send(new VerificationMail($token));
        return redirect('/email-redirection')->with('success', 'Registration successful, Please check your email to verify your account!!');
    }
    public function emailMessage(){
        return view('emailRedirection');
    }
    public function verifyEmail($token){
        $user = User::where('verification_token', $token)->first();
        if($user){
            $user->email_verified = true;
            $user->verification_token = null;
            $user->save();
            return redirect('/login')->with('success', 'Email verified successfully, you can now login');
        }
        return redirect('/login')->with('error', 'Invalid verification token');
    }

}
