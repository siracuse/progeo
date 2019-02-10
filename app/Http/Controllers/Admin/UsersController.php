<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function getAll () {
        $users = User::get(['id', 'name', 'firstname', 'phone', 'email', 'is_resp']);
        return view ('admin.user_list',[ 'users' => $users]);
    }

    public function getNew (Request $request) {
        if ($request->input('submit')) {
            if(($request->input('password')) !== ($request->input('passwordConfirmation'))) {
                return redirect()->route('user_new')->with('error', 'Les deux mots de passe ne sont pas identiques');
            }else {
                $this->validate($request, ['name' => 'required']);
                $user = new User();
                $user->name = $request->input('name');
                $user->firstname = $request->input('firstname');
                $user->phone = $request->input('phone');
                $user->email = $request->input('email');
                $user->password = $request->input('password');
                $user->is_resp = $request->input('is_resp');
                $user->save();
                return redirect()->route('user_list');
            }
        }
        return view('admin.user_new');
    }

    public function getEdit ($user_id) {
        $user = User::findOrFail($user_id);
        return view ('admin.user_edit',[ 'user' => $user]);
    }

    public function postEdit (Request $request) {
        $this->validate($request, ['name' => 'required']);
        $user = User::findOrFail($request->input('user_id'));
        $user->name = $request->input('name');
        $user->firstname = $request->input('firstname');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->is_resp = $request->input('is_resp');
        $user->save();
        return redirect()->route('user_list');
    }

    public function getDelete ($user_id) {
        $user = User::findOrFail($user_id);
        $user->delete();
        return redirect()->route('user_list');
    }
}