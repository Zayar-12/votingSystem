<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;// email verify

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user)); // email verify event(new Registered($user))

        Auth::login($user);

        

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    public function login(Request $request) {
    $credentials=    $request->validate([ 
            'email'=>'required|email',
            'password'=>'required|min:4'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            $user=Auth::user();
            if($user->role=='admin' || $user->role=='superadmin'){
                return redirect()->route('admin.home')->with('success', 'Welcome back!');
            }
            return redirect()->route('home')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect('/')->with('success', 'Logged out successfully!');


    }
}
