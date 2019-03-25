<?php

namespace App\Http\Controllers\Manager;

use App\Manager;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function getEditAccount () {
        $manager = User::findOrFail(Auth::user()->id);
        return view ('manager.manager_editAccount',[ 'manager' => $manager]);
    }

    public function postEditAccount (Request $request) {
        $this->validate($request, ['name' => 'required']);
        $user = User::findOrFail($request->input('user_id'));
        $user->name = $request->input('name');
        $user->firstname = $request->input('firstname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();
        return redirect()->route('manager_home');
    }


    public function getPassword (Request $request) {
        if ($request->input('password')) {
//            if (bcrypt($request->input('password')) === Auth::user()->password){
            if(($request->input('newpassword')) !== ($request->input('newpasswordseconde'))) {
                return redirect()->route('manager_edit_password')->with('error', 'Les deux mots de passe ne sont pas identiques');
            }
            else {
                $this->validate($request, ['password' => 'required']);
                $user = User::findOrFail(Auth::user()->id);
                $user->password = bcrypt($request->input('newpassword'));
                $user->save();
                return redirect()->route('manager_home');
            }
//            } else {
//                return redirect()
//                    ->route('user_edit_password')
//                    ->with('error', Auth::user()->getAuthPassword())
//            }

        }
        return view('manager.manager_editPassword');
    }
}
