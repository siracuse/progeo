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
        $favoris = Store::with('userSecond')->get();
        return view ('user.favoris',[
            'favoris' => $favoris
        ]);
    }

    public function update ($store_id, $user_id) {
        DB::table('store_user')
            ->where('store_id', $store_id)
            ->where('user_id', $user_id)
            ->update(['favoris' => 0]);
        return redirect()->route('user_favoris');
    }
}
