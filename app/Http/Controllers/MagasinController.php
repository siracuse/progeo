<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Magasin;
use App\Http\Requests\MagasinCreateRequest;

class MagasinController extends Controller
{
    public function getForm() {
        return view ('magasin');
    }

    public function postForm(MagasinCreateRequest $request, Magasin $magasin) {
        $magasin->nomMag = $request->input('nomMag');
        $magasin->adrMag = $request->input('adrMag');
        $magasin->telMag = $request->input('telMag');
        $magasin->mailMag = $request->input('mailMag');
        $magasin->siret = $request->input('siret');
        $magasin->photo1 = $request->input('photo1');
        $magasin->photo2 = $request->input('photo2');
        $magasin->latitude = $request->input('latitude');
        $magasin->longitude = $request->input('longitude');
        $magasin->insee = $request->input('insee');
        $magasin->cp = $request->input('cp');
        $magasin->save();
        return view ('magasin_ok');
    }
}
