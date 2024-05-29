<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }

    public function users()
    {
        return view('admin.users' , ['users' => User::all()]);
    }
}
