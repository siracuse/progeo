<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $promos = DB::table('store_user')
            ->join('stores', 'stores.id', '=', 'store_user.store_id')
            ->join('users', 'users.id', '=', 'store_user.user_id')
            ->join('promotions', 'promotions.id', '=', 'store_user.promo_id')
            ->where('users.id', '=', Auth::user()->id)
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

        $favoris = DB::table('store_user')
            ->join('stores', 'store_user.store_id', '=', 'stores.id')
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



        return view('user.home', [
            'favoris' => $favoris,
            'promos' => $promos
        ]);
    }
}
