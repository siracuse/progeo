<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Store;

class PromotionController extends Controller
{
    public function formRating ($promo_id) {

        $ratings = DB::table('promotion_user')
            ->join('users', 'promotion_user.user_id', '=', 'users.id')
            ->join('promotions', 'promotions.id', '=', 'promotion_user.promotion_id')
            ->where ('promotion_user.promotion_id', '=', $promo_id)
            ->select(
                'promotion_user.rating',
                'promotion_user.comment',
                'promotion_user.date',
                'promotions.store_id',
                'promotions.name as promo_name',
                'users.name'
            )
            ->orderBy('date', 'desc')
            ->get();


        foreach ($ratings as $key => $values) {
            $store_id = $values->store_id;
        }

        if (empty($store_id)) {
            $monStoreId = DB::table('promotions')
                ->where('promotions.id', '=', $promo_id)
                ->select('promotions.store_id')
                ->first();
            $store = Store::where('id', $monStoreId->store_id)->first();

            return view ('storeRating',[
                'ratings' => $ratings,
                'store' => $store,
                'promo_id' => $promo_id
            ]);
        }

        $store = Store::where('id', $store_id)->first();
        return view ('storeRating',[
            'ratings' => $ratings,
            'store' => $store,
            'promo_id' => $promo_id
        ]);
    }


    public function getNew (Request $request) {
        if ($request->input('comment')) {
            $this->validate($request, ['comment' => 'required']);
            $avis = DB::table('promotion_user')
                ->where('promotion_user.user_id', '=', Auth::user()->id)
                ->where('promotion_user.promotion_id', '=', $request->input('promo_id'))
                ->first();
            if (!$avis) {
                $promo = Promotion::findOrFail($request->input('promo_id'));

                if ($promo->opinionCode === $request->input('code')) {
                    //si le code opinion correspond alors on insère
                    DB::table('promotion_user')->insert(
                        array(
                            'promotion_id' => $request->input('promo_id'),
                            'user_id' => Auth::user()->id,
                            'rating' => $request->input('rating'),
                            'comment' => $request->input('comment'),
                            'date' => date("Y-m-d H:i:s"),
                        )
                    );
                    return redirect()
                        ->route('promo_rating', ['promo_id' => $request->input('promo_id')])
                        ->with('success', 'Votre avis à bien été enregistré');
                } //sinon
                else {
                    //redirection avec erreur !!!
                    return redirect()
                        ->route('promo_rating', ['promo_id' => $request->input('promo_id')])
                        ->with('error', 'Le code avis est incorrecte');
                }
            }
        }
        return redirect()->route('user_home')->with('error', 'Vous avez déjà laissé un avis pour cette promotion');
    }
}
