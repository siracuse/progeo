<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function redirect_home()
    {
        if (Auth::user()) {
            if (Auth::user()->is_resp === 1) {
                return redirect()->route('manager_home');
            }
            return redirect()->route('user_home');
        }
        return redirect()->route('home');
    }
}
