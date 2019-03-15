<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    public function formRating ($promo_id) {
        $rating = DB::table('promotion_user')
            ->join('promotions', 'promotions.id', '=', 'promotion_user.promotion_id')
            ->join('users', 'promotion_user.user_id', '=', 'user_id')
            ->join('cities', 'stores.city_id', '=', 'cities.id')
            ->join('categories', 'stores.category_id', '=', 'categories.id')
            ->join('subcategories', 'stores.subcategory_id', '=', 'subcategories.id')
            ->where('store_user.user_id', '=', Auth::user()->id)
            ->where('store_user.favoris', '=', 1)
            ->select(
                'stores.id as store_id',
                'stores.name as store_name',
                'stores.address',
                'stores.phone',
                'categories.name as category_name',
                'subcategories.name as subcategory_name',
                'cities.name as city_name',
                'cities.postalCode'
            )
            ->get();

        return view ('user.favoris',[
            'favoris' => $favoris
        ]);
    }
}
