<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Request;

class RegisteredController extends Controller
{
    public function index() {
        // $users = User::where('role_as', Request::get('roles'))->get();
        // return view('admin.users.index')->with('users', $users);
        $users = User::all();
        if(Request::get('roles') != 'all') {
            $users = User::where('role_as', Request::get('roles'))->get();
            return view('admin.users.index')->with('users', $users);
        }
        if (Request::get('roles') == 'all') {
            return view('admin.users.index')->with('users', $users);
        }
    }
    public function edit($id) {
        $user_roles = User::find($id);
        return view('admin.users.edit')->with('user_roles', $user_roles);
    }
    public function updaterole(Request $request ,$id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->role_as = $request->input('roles');
        $user->isban = $request->input('isban');
        $user->update();

        return redirect()->back()->with('status', 'Role is successfully updated');
    }
}
