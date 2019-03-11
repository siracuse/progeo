<?php

namespace App\Http\Controllers\User;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CodePromosController extends Controller
{
    public function getAll () {

        $promos = DB::table('store_user')
            ->join('stores', 'stores.id', '=', 'store_user.store_id')
            ->join('users', 'users.id', '=', 'store_user.user_id')
            ->join('promotions', 'promotions.id', '=', 'store_user.promo_id')
            ->where('users.id', '=', Auth::user()->id)
            ->select('stores.name as store_name', 'promotions.name as promo_name', 'promotions.promotionCode', 'promotions.id as promo_id', 'promotions.startDate',
                'promotions.endDate')
            ->get();
        

        return view ('user.codePromo',[
            'promos' => $promos
        ]);
    }

    public function userGetPromo($store_id, $promotion_id, $user_id){

        $check_promo = DB::table('store_user')
            ->where('user_id', '=', $user_id)
            ->where('store_id', '=', $store_id)
            ->where('promo_id', '=', $promotion_id)
            ->get();

        if(count($check_promo) > 0){
            return view('user/home', ['error' => 'promo déjà ajoutée']);
        }else{
            DB::table('store_user')->insert(
                [
                    'store_id' => $store_id,
                    'promo_id' => $promotion_id,
                    'user_id' => $user_id]
            );

            return view('user/home');
        }

    }
}
