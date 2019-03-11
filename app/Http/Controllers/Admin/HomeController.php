<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store;
use App\User;

class HomeController extends Controller
{
    public function index () {
        $stores = Store::get()->count();
        $users = User::get()->count();
        return view ('admin.home',[ 'stores' => $stores, 'users' => $users]);
    }
}
