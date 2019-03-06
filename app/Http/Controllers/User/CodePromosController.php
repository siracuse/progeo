<?php

namespace App\Http\Controllers\User;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CodePromosController extends Controller
{
    public function getAll () {
        $codePromos = Store::with('userSecond')->get();
        return view ('user.codePromo',[
            'codePromos' => $codePromos,
        ]);
    }

    public function userGetPromo($promotion_id, $user_id){
        DB::table('promotion_user')->insert(
            ['promotion_id' => $promotion_id,
                'user_id' => $user_id]
        );

        return view('user/home');
    }
}
