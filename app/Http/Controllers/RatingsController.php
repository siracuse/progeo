<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingsController extends Controller
{
    public function getNew (Request $request) {
        if ($request->input('name')) {
            $this->validate($request, ['name' => 'required']);
            $category = new Category ();
            $category->name = $request->input('name');
            $category->save();
            return redirect()->route('category_list');
        }
        return view('admin.category_new');
    }
}
