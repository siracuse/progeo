<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index () {
        $stores = Store::get()->count();
        $users = DB::table('users')->where('is_resp', '=', '0')->get()->count();
        $managers = DB::table('users')->where('is_resp', '=', '1')->get()->count();
        $codepromo = DB::table('codepromo')->get()->count();
        $promo = DB::table('promotions')->get()->count();
        $avis = DB::table('promotion_user')->get()->count();
        return view ('admin.home',[
            'stores' => $stores,
            'users' => $users,
            'managers' => $managers,
            'codepromo' => $codepromo,
            'promo' => $promo,
            'avis' => $avis,
        ]);
    }
}
