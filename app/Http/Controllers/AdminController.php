<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

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

        $report = new Report();
        $report->action = 'User deleted ' . $user->name;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

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

        $report = new Report();
        $report->action = 'User updated ' . $user->name;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();
        
        return redirect()->intended('/admin/users');
    }

}
