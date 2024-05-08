<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        //login code
        if (Auth::attempt($credentials)) {
            return redirect('home');
        }

        return redirect('login')->withErrors('Login details are not valid');
       
        
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user record
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ]);

        // Attempt to log in the newly registered user
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('home');
        }

        return redirect('register')->withErrors(['error' => 'Error message here']);
    }

    public function home()
    {
        return view('home');
    }
    public function logout()
    {
        \session::flush();
        \Auth::logout();
        return redirect('');
    }
}
