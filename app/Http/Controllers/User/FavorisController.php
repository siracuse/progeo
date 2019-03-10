<?php

namespace App\Http\Controllers\User;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavorisController extends Controller
{

    public function getAll () {
        $favoris = DB::table('store_user')
            ->join('stores', 'store_user.store_id', '=', 'stores.id')
            ->join('cities', 'stores.city_id', '=', 'cities.id')
            ->where('store_user.user_id', '=', Auth::user()->id)
            ->where('store_user.favoris', '=', 1)
            ->select('stores.id as store_id', 'stores.name as store_name', 'stores.address','cities.name as city_name', 'cities.postalCode')
            ->get();

        return view ('user.favoris',[
            'favoris' => $favoris
        ]);
    }

    public function update ($store_id, $user_id) {
        DB::table('store_user')
            ->where('store_id', $store_id)
            ->where('user_id', $user_id)
            ->update(['favoris' => 1]);
        return redirect()->route('user_favoris');
    }

    public function delete($store_id, $user_id){
        echo "coucou";
        DB::table('store_user')
            ->where('store_id', $store_id)
            ->where('user_id', $user_id)
            ->update(['favoris' => 0]);
        return redirect()->route('user_favoris');
    }
}
