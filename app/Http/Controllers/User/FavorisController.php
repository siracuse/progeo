<?php

namespace App\Http\Controllers\User;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavorisController extends Controller
{

    public function getAll () {
        $favoris = Store::with('userSecond')->get();
        return view ('user.favoris',[
            'favoris' => $favoris,
        ]);
    }
}
