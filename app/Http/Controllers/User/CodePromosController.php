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

        $promos = DB::table('codepromo')
            ->join('users', 'users.id', '=', 'codepromo.user_id')
            ->join('promotions', 'promotions.id', '=', 'codepromo.promotion_id')
            ->join('stores', 'stores.id', '=', 'promotion.store_id')
            ->where('codepromo.user_id', '=', Auth::user()->id)
            ->select(
                'stores.id as store_id',
                'stores.name as store_name',
                'users.id as user_id',
                'promotions.name as promo_name',
                'promotions.promotionCode',
                'promotions.id as promo_id',
                'promotions.startDate',
                'promotions.endDate'
            )
            ->get();

        return view ('user.codePromo',[
            'promos' => $promos
        ]);
    }


    public function userGetPromo(Request $request){

        $check_promo = DB::table('codepromo')
            ->where('user_id', '=', Auth::user()->id)
//            ->where('store_id', '=', $request->input('store_id'))
            ->where('promotion_id', '=', $request->input('promo_id'))
            ->get();

        if(count($check_promo) > 0){
            return ['info' => 'fail'];
        }else{
            DB::table('codepromo')->insert(
                [
                    'promotion_id' => $request->input('promo_id'),
                    'user_id' => Auth::user()->id
                ]
            );

            return ['info' => 'c bon frere'];
        }

    }

    public function delete($store_id, $user_id, $promo_id){
        DB::table('store_user')
            ->where('store_id', $store_id)
            ->where('user_id', $user_id)
            ->where('promo_id', $promo_id)
            ->update(['user_id' => 0]);
        return redirect()->route('user_codePromo');
    }


}
