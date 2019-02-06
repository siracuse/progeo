<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcategory;
use App\Category;
use Illuminate\Support\Facades\DB;

class SubcategoriesController extends Controller
{
    public function getAll () {
        $categories = Category::with('subcategories')->get();
        return view ('admin.subcategory_list',['categories' => $categories]);
    }

    public function getNew (Request $request) {
        if ($request->input('name')) {
            $this->validate($request, ['name' => 'required']);
            $subcategory = new Subcategory();
            $subcategory->name = $request->input('name');
            $subcategory->category_id = $request->input('categorie');
            $subcategory->save();
            return redirect()->route('subcategory_list');
        }
        $categories = Category::get(['id', 'name']);
        return view('admin.subcategory_new',['categories' => $categories]);
    }

    public function getEdit ($subcategory_id) {
        $subcategory = Subcategory::findOrFail($subcategory_id);
        $category = Category::findOrFail($subcategory->category_id);
        $categories = Category::get();
        return view ('admin.subcategory_edit',['subcategory' => $subcategory, 'category' => $category, 'categories' => $categories]);
    }

    public function postEdit (Request $request) {
        $this->validate($request, ['name' => 'required']);
        $subcategory = Subcategory::findOrFail($request->input('subcategory_id'));
        $subcategory->name = $request->input('name');
        $subcategory->category_id = $request->input('categorie');
        $subcategory->save();
        return redirect()->route('subcategory_list');
    }

    public function getDelete ($subcategory_id) {
        $subcategory = Subcategory::findOrFail($subcategory_id);
        $subcategory->delete();
        return redirect()->route('subcategory_list');
    }
}
