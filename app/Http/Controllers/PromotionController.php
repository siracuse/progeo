<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Store;

class PromotionController extends Controller
{
    public function formRating ($promo_id) {
        $ratings = DB::table('promotion_user')
            ->join('users', 'promotion_user.user_id', '=', 'users.id')
            ->join('promotions', 'promotions.id', '=', 'promotion_user.promotion_id')
            ->select(
                'promotion_user.rating',
                'promotion_user.comment',
                'promotions.store_id',
                'users.name'
            )
            ->get();

        foreach ($ratings as $key => $values) {
            $store_id = $values->store_id;
        }

        $store = Store::where('id', $store_id)->first();

        return view ('storeRating',[
            'ratings' => $ratings,
            'store' => $store
        ]);
    }
}
