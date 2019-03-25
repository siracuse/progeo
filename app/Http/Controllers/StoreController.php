<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
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
        $promotions = DB::table('promotions') ->where('store_id', '=', $store->id)->where('activated', '=', '1')->where('endDate',  '>', date('Y-m-d H:i:s'))->get();
        $user = User::findOrFail($store->user_id);

        $img_1 = 'Images/stores/'.$user->id . '_' . $user->name.'/'.$store->photoInside;
        $img_2 = 'Images/stores/'.$user->id . '_' . $user->name.'/'.$store->photoOutside;

        return view ('storeDetails',[
            'store' => $store,
            'category' => $category,
            'subcategory' => $subcategory,
            'promotions' => $promotions,
            'city' => $city,
            'img_1' => $img_1,
            'img_2' => $img_2
        ]);
    }
}