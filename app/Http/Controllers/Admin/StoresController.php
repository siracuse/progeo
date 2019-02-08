<?php

namespace App\Http\Controllers\Admin;

use App\Manager;
use App\Store;
use App\City;
use App\Category;
use App\Subcategory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoresController extends Controller
{
    public function getAll () {
        $stores = Store::with('user', 'subcategory.category', 'city')->simplePaginate(10);
        return view ('admin.store_list',[
            'stores' => $stores,
        ]);
    }

    public function getNew (Request $request) {
        if ($request->input('name')) {
            $this->validate($request, ['name' => 'required']);
            $store = new Store();
            $store->name = $request->input('name');
            $store->address = $request->input('address');
            $store->phone = $request->input('phone');
            $store->email = $request->input('email');
            $store->siret = $request->input('siret');
            $store->photoInside = $request->input('photoInside');
            $store->photoOutside = $request->input('photoOutside');
            $store->latitude = $request->input('latitude');
            $store->longitude = $request->input('longitude');

            $store->city_id = $request->input('city_id');;
            $store->category_id = $request->input('category_id');
            $store->subcategory_id = $request->input('subcategory_id');
            $store->user_id = $request->input('user_id');;

            $store->save();
            return redirect()->route('store_list');
        }
        $categories = Category::get();
//        $cities = City::get();
        $subcategories = Subcategory::get();
        return view('admin.store_new', [
            'categories' => $categories,
//            'cities' => $cities,
            'subcategories' => $subcategories
        ]);
    }

    public function getEdit ($store_id) {
        $store = Store::findOrFail($store_id);

        $category = Category::findOrFail($store->category_id);
        $categories = Category::get();

        $subcategory = Subcategory::findOrFail($store->subcategory_id);
        $subcategories = Subcategory::get();

        $user = User::findOrFail($store->user_id);
        $users = User::get();

        return view ('admin.store_edit',[
            'store' => $store,
            'category' => $category,
            'categories' => $categories,
            'subcategory' => $subcategory,
            'subcategories' => $subcategories,
            'user' => $user,
            'users' => $users,
        ]);
    }

    public function postEdit (Request $request) {
        $this->validate($request, ['name' => 'required']);

        $store = Store::findOrFail($request->input('store_id'));
        $store->name = $request->input('name');
        $store->address = $request->input('address');
        $store->phone = $request->input('phone');
        $store->email = $request->input('email');
        $store->siret = $request->input('siret');
        $store->photoInside = $request->input('photoInside');
        $store->photoOutside = $request->input('photoOutside');
        $store->latitude = $request->input('latitude');
        $store->longitude = $request->input('longitude');

        $store->city_id = $request->input('city_id');
        $store->category_id = $request->input('category_id');
        $store->subcategory_id = $request->input('subcategory_id');
        $store->user_id = $request->input('user_id');

        $store->save();
        return redirect()->route('store_list');
    }

    public function getDelete ($store_id) {
        $store = Store::findOrFail($store_id);
        $store->delete();
        return redirect()->route('store_list');
    }
}
