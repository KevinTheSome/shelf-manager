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

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect()->intended('/admin/users');
    }

    public function edit($id)
    {
        return view('admin.edit', ['user' => User::find($id)]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:Admin,Stocker,Accountant',
            'email' => 'required|email|max:255',
            'user_id' => 'required|integer',
        ]);

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles = $request->role;
        $user->save();
        
        return redirect()->intended('/admin/users');
    }

}
