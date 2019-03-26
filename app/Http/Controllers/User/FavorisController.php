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

    public function update ($store_id, $user_id) {
        $mesFavoris = DB::table('store_user')
            ->where('store_id', '=', $store_id)
            ->where('user_id', '=', $user_id)
            ->where('favoris', '=', 1)
            ->select('favoris')
            ->first();

        if ($mesFavoris) {
            DB::table('store_user')
                ->where('store_id','=' ,$store_id)
                ->where('user_id','=' ,$user_id)
                ->update(['favoris' => 0]);
            return redirect()->route('store_details', $store_id)->with('success', 'Ce magasin a été retiré de vos favoris');
        }

        DB::table('store_user')
            ->insert([
                    'store_id' => $store_id,
                    'user_id' => $user_id,
                    'favoris' => 1,
                ]
            );
        return redirect()->route('store_details', $store_id)->with('success', 'Ce magasin a été ajouté en favoris');
    }

    public function delete(Request $request){
        DB::table('store_user')
            ->where('store_id', '=', $request->input('store_id'))
            ->where('user_id', '=', Auth::user()->id)
            ->delete();

        return redirect()->route('user_home');
    }
}
