<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            $report = new Report();
            $report->action = 'New User logged in ' .  Auth::user()->name;
            $report->time = date('Y-m-d H:i:s');
            $report->user_id = Auth::user()->id;
            $report->save();

            return redirect()->intended('/dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|in:Admin,Stocker,Accountant',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->roles = $request->input('roles');
        $user->save();

        $report = new Report();
        $report->action = 'New User registered ' . $user->name;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = $user->id;
        $report->save();

        return redirect()->intended('/login');  
    }

    public function logout()
    {
        session()->invalidate();

        $report = new Report();
        $report->action = 'User logged out ' .  Auth::user()->name;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

        auth()->logout();
        return redirect()->intended('/login');
    }
}
