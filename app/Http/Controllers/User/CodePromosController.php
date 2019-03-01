<?php

namespace App\Http\Controllers\User;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodePromosController extends Controller
{
    public function getAll () {
        $codePromos = Store::with('userSecond')->get();
        return view ('user.codePromo',[
            'codePromos' => $codePromos,
        ]);
    }
}
