<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
    }

    public function registerUser(Request $request)
    {
        
    }

    public function logout()
    {
        session()->invalidate();
        auth()->logout();
        return redirect()->intended('/login');
    }
}
