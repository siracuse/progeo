<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{

    public function getAll () {
        $promotions = Promotion::with('store')->get();
        return view ('admin.promotion_list',[ 'promotions' => $promotions]);
    }

    public function getNew (Request $request)
    {
        if (Promotion::where('activated', '=', '1')->count() === 999) {
            return redirect()->route('promotion_list')->with('error', 'Vous ne pouvez plus rajouter des promotions pour ce magasin');
        }
        if ($request->filled('name')) {
            $random = str_pad(rand(1, 999),  3, "0" , STR_PAD_LEFT);
            while(Promotion::where('activated', '=', '1')->where('promotionCode', '=', $random)->first()) {
                $random = str_pad(rand(1, 999),  3, "0" , STR_PAD_LEFT);
            }
                if (!(DB::table('stores')->where('name', '=', $request->input('storeName'))->first())) {
                    return redirect()->route('promotion_new')->with('error', 'Le nom du magasin est incorrect');
                }
                $promotion = new Promotion();
                $promotion->name = $request->input('name');
                $promotion->startDate = date('Y-m-d', strtotime($request->input('dateStart')));
                $promotion->endDate = date('Y-m-d', strtotime($request->input('dateStart')));
                $promotion->photo1 = $request->input('photo1');
                $promotion->photo2 = $request->input('photo2');
                $promotion->activated = $request->input('activated');

                $promotion->promotionCode = $random;
                $promotion->opinionCode = str_pad(rand(1, 999),  3, "0" , STR_PAD_LEFT);

                $store = DB::table('stores')->where('name', '=', $request->input('storeName'))->get();

                foreach($store as $key => $value) {
                    $monId = $value->id;
                }
                $promotion->store_id = $monId;

                $promotion->save();
                return redirect()->route('promotion_list')->with('error', 'dodo');
        }

        $store = DB::table('stores')->where('name', '=', 'Hotel F1')->get();
        foreach($store as $key => $value) {$store_id = $value->id;}
        return view('admin.promotion_new',['store' => $store_id ]);
    }


    public function getEdit ($promotion_id) {
        $promotion = Promotion::with('store')->findOrFail($promotion_id);
        return view ('admin.promotion_edit',[
            'promotion' => $promotion,
        ]);
    }

    public function postEdit (Request $request) {
        $this->validate($request, ['name' => 'required']);
        $promotion = Promotion::with('store')->findOrFail($request->input('promotion_id'));
        $promotion->name = $request->input('name');
        $promotion->startDate = $request->input('dateStart');
        $promotion-> endDate = $request->input('dateEnd');
        $promotion->photo1 = $request->input('photo1');
        $promotion->photo2 = $request->input('photo2');
        $promotion->activated = $request->input('activated');
        $promotion->opinionCode = rand(100, 999);

        $store = DB::table('stores')->where('name', '=', $request->input('storeName'))->get();
        foreach($store as $key => $value) {$monId = $value->id;}
        $promotion->store_id = $monId;

        $promotion->save();
        return redirect()->route('promotion_list')->with('success', 'Votre promotion à bien été modifié');
    }

    public function getDelete ($promotion_id) {
        $promotion = Promotion::findOrFail($promotion_id);
        $promotion->delete();
        return redirect()->route('promotion_list');
    }
}
