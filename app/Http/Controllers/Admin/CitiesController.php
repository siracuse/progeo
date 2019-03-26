<?php

namespace App\Http\Controllers\Admin;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    public function getAll () {
        $cities = City::simplePaginate(15);
        return view ('admin.city_list',[ 'cities' => $cities]);
    }

    public function getNew (Request $request) {
        if ($request->input('name')) {
            $this->validate($request, [
                'name' => 'required'

            ]);
            $city = new City ();
            $city->name = $request->input('name');
            $city->insee = $request->input('insee');
            $city->postalCode = $request->input('postalCode');
            $city->latitude = $request->input('latitude');
            $city->longitude = $request->input('longitude');
            $city->save();
            return redirect()->route('city_list')->with('success', 'Votre ville à bien été enregistré');
        }
        return view('admin.city_new');
    }

    public function getEdit ($city_id) {
        $city = City::findOrFail($city_id);
        return view ('admin.city_edit',[ 'city' => $city]);
    }

    public function postEdit (Request $request) {
        $this->validate($request, ['name' => 'required']);
        $city = City::findOrFail($request->input('city_id'));
        $city->name = $request->input('name');
        $city->save();
        return redirect()->route('city_list')->with('success', 'Votre ville à bien été modifié');
    }

    public function getDelete ($city_id) {
        $city = City::findOrFail($city_id);
        $city->delete();
        return redirect()->route('city_list');
    }

    public function postSearchCities(Request $request){
        //ajouter route fichier web.php

        $cities = City::Where('name', 'like', '%' . $request->input('city') . '%')
            ->limit(10)
            ->get();

        return ['cities' => $cities];
    }
}