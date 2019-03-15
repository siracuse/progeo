<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Promotion;
use App\Store;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function getDetails ($store_id) {
        $store = Store::findOrFail($store_id);
        $category = Category::findOrFail($store->category_id);
        $subcategory = Subcategory::findOrFail($store->subcategory_id);
        $city = City::findOrFail($store->city_id);
        $promotions = DB::table('promotions') ->where('store_id', '=', $store->id)->get();

        return view ('storeDetails',[
            'store' => $store,
            'category' => $category,
            'subcategory' => $subcategory,
            'promotions' => $promotions,
            'city' => $city
        ]);
    }
}