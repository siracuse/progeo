<?php

namespace App\Http\Controllers;


use App\Store;
use App\Promotion;
use App\City;
use App\Category;
use App\Subcategory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ManagerController extends Controller
{
    public function getStores()
    {
        $stores = DB::table('stores')
            ->join('users', 'users.id', '=', 'stores.user_id')
            ->join('cities', 'cities.id', '=', 'stores.city_id')
            ->join('categories', 'categories.id', '=', 'stores.category_id')
            ->join('subcategories', 'subcategories.id', '=', 'stores.subcategory_id')
            ->select('stores.id', 'stores.name as store_name', 'cities.name as city_name',
                'cities.postalCode', 'categories.name as cat_name', 'subcategories.name as subcat_name')
            ->where('stores.user_id', '=', Auth::user()->id)
            ->get();

        return view('manager/manager_home', ['stores' => $stores]);
    }

    public function addStore(Request $request)
    {
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

            $villeID = DB::table('cities')->where('name', '=', $request->input('city_name'))->get();
            foreach ($villeID as $key => $value) {
                $id = $value->id;
            }

            $store->city_id = $id;
            $store->category_id = $request->input('category_id');
            $store->subcategory_id = $request->input('subcategory_id');
            $store->user_id = Auth::user()->id;

            $user = DB::table('users') ->where('id', '=', Auth::user()->id)
                ->get();
            foreach ($user as $key => $value)
                $user_id = $value->id; $user_name = $value->name;
            $directory_path = public_path().'/Images/stores/'.$user_id . '_' . $user_name;

            if(!file_exists($directory_path))
                File::makeDirectory($directory_path, $mode = 0777, true, true);

            if( $request->file('photoInside')){
                $file1 = $request->file('photoInside');
                $file1_name = str_replace(' ','',$request->input('name')).'Inside'.rand(10, 10000).'.'.$file1->getClientOriginalExtension();
                $file1->move($directory_path, $file1_name);
                $store->photoInside = $file1_name;
            }
            if( $request->file('photoOutside')){
                $file2 = $request->file('photoOutside');
                $file2_name = str_replace(' ','',$request->input('name')).'Outside'.rand(10, 10000).'.'.$file2->getClientOriginalExtension();
                $file2->move($directory_path, $file2_name);
                $store->photoOutside = $file2_name;
            }

            $store->save();

           return redirect()->route('manager_home');
        }
        $categories = Category::get();
        $subcategories = Subcategory::get();

        return view('manager.manager_add_store', [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);

        return view('manager/manager_add_store');
    }

    public function getEditStore($store_id)
    {
        $store = Store::findOrFail($store_id);

        $category = Category::findOrFail($store->category_id);
        $categories = Category::get();

        $subcategory = Subcategory::findOrFail($store->subcategory_id);
        $subcategories = Subcategory::get();

        $user = User::findOrFail($store->user_id);

        return view('manager.manager_edit_store', [
            'store' => $store,
            'category' => $category,
            'categories' => $categories,
            'subcategory' => $subcategory,
            'subcategories' => $subcategories,
            'user' => $user,
        ]);
    }

    public function postEditStore (Request $request) {
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

        //Si l'utilisateur renseigne les champs image
        //->supprimer les anciennes
        //->ajouter les nouvelles


        $store->save();
        return redirect()->route('manager_home');
    }

    public function deleteStore($store_id)
    {
        $store = Store::findOrFail($store_id);

        $user = DB::table('users') ->where('id', '=', $store->user_id)
            ->get();
        foreach ($user as $key => $value)
            $user_id = $value->id; $user_name = $value->name;

        $directory_path = public_path().'/Images/stores/'.$user_id . '_' . $user_name;
        File::delete($directory_path.'/'.$store->photoInside);
        File::delete($directory_path.'/'.$store->photoOuside);
        $store->delete();
        return redirect()->route('manager_home');
    }

    public function getAllPromos(){
        $promos = DB::table('promotions')
            ->join('stores', 'stores.id', '=', 'promotions.store_id')
            ->join('users', 'users.id', '=', 'stores.user_id')
            ->where('users.id', '=', Auth::user()->id)
            ->select('stores.name as store_name', 'promotions.name as promo_name','promotions.id as promo_id', 'promotions.startDate',
                'promotions.endDate')
            ->get();

        return view('manager/manager_promos', ['promos' => $promos]);
    }

    public function addPromo($store_id = null, Request $request){
        if ($request->filled('name')) {
            $random = str_pad(rand(1, 999),  3, "0" , STR_PAD_LEFT);
            while(Promotion::where('activated', '=', '1')->where('promotionCode', '=', $random)->first()) {
                $random = str_pad(rand(1, 999),  3, "0" , STR_PAD_LEFT);
            }
            $promotion = new Promotion();
            $promotion->name = $request->input('name');
            $promotion->startDate = date('Y-m-d', strtotime($request->input('dateStart')));
            $promotion->endDate = date('Y-m-d', strtotime($request->input('dateStart')));

            $promotion->photo1 = $request->file('photoInside');
            $promotion->photo2 = $request->file('photoOutside');

            $promotion->activated = $request->input('activated');
            $promotion->promotionCode = $random;
            $promotion->opinionCode = str_pad(rand(1, 999),  3, "0" , STR_PAD_LEFT);


            $promotion->store_id = $request->input('store_id');

            $promotion->save();
            return redirect()->route('manager_home');
        }

        $store = Store::findOrFail($store_id);
        return view('manager/manager_new_promo', ['store' => $store]);
    }

    public function refreshPromo($promo_id){
        //current Datetime
        $currentDate = date('Y-m-d H:i:s');
        $currentDatePLusOneMonth = date('Y-m-d H:i:s', strtotime(' +1month'));

        //on update la date de debut (date du jour actuel) et date de fin(date debut + 1 mois)
        //on peut surement tout faire d'un coup mais pas trouvé
        DB::table('promotions')
            ->where('id','=', $promo_id)
            ->update(['startDate' => $currentDate]);
        DB::table('promotions')
            ->where('id','=', $promo_id)
            ->update(['endDate' => $currentDatePLusOneMonth]);
        DB::table('promotions')
            ->where('id','=', $promo_id)
            ->update(['activated' => '1']);

       // return view('manager/manager_test',  ['date' => $currentDatePLusOneMonth]);
        return redirect()->route('manager_get_promos', ['date' => $currentDatePLusOneMonth]);
    }


}
