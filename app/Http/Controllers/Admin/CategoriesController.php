<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function getAll () {
        $categories = Category::get(['id', 'name']);
        return view ('admin.category_list',[ 'categories' => $categories]);
    }

    public function getNew (Request $request) {
        if ($request->input('name')) {
            $this->validate($request, ['name' => 'required']);
            $category = new Category ();
            $category->name = $request->input('name');
            $category->save();
            return redirect()->route('category_list');
        }
        return view('admin.category_new')->with('success', 'Votre catégorie à bien été enregistré');
    }

    public function getEdit ($category_id) {
        $category = Category::findOrFail($category_id);
        return view ('admin.category_edit',[ 'category' => $category]);
    }

    public function postEdit (Request $request) {
        $this->validate($request, ['name' => 'required']);
        $category = Category::findOrFail($request->input('category_id'));
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('category_list')->with('success', 'Votre catégorie à bien été modifié');
    }

    public function getDelete ($category_id) {
        $category = Category::findOrFail($category_id);
        $category->delete();
        return redirect()->route('category_list');
    }

    public function postSearchCategories(){
        //$categories = Category::get('id', 'name');
       $categories = Category::get(['id', 'name']);

        return ['categories' => $categories];
    }
}
