<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();


//Page d'accueil avec la carte
Route::get('/', 'HomeController@index')->name('home');




//Liste categorie
Route::get ('/admin/category/list', 'Admin\CategoriesController@getAll')->name('category_list');

//Ajout categorie
Route::get ('/admin/category/new', 'Admin\CategoriesController@getNew')->name('category_new');
Route::post ('/admin/category/new', 'Admin\CategoriesController@getNew')->name('category_new_post');

//Modification categorie
Route::get ('/admin/category/edit/{category_id}', 'Admin\CategoriesController@getEdit')->name('category_edit');
Route::post ('/admin/category/edit', 'Admin\CategoriesController@postEdit')->name('category_edit_post');

//Suppression categorie
Route::get ('/admin/category/delete/{category_id}', 'Admin\CategoriesController@getDelete')->name('category_delete');


//Liste ville
Route::get ('/admin/city/list', 'Admin\CitiesController@getAll')->name('city_list');

//Ajout ville
Route::get ('/admin/city/new', 'Admin\Citiescontroller@getNew')->name('city_new');
Route::post ('/admin/city/new', 'Admin\CitiesController@getNew')->name('city_new_post');

//Modification ville
Route::get ('/admin/city/edit/{city_id}', 'Admin\CitiesController@getEdit')->name('city_edit');
Route::post ('/admin/city/edit', 'Admin\CitiesController@postEdit')->name('city_edit_post');

//Suppression ville
Route::get ('/admin/city/delete/{city_id}', 'Admin\CitiesController@getDelete')->name('city_delete');




//Liste subcategorie
Route::get ('/admin/subcategory/list', 'Admin\SubcategoriesController@getAll')->name('subcategory_list');

//Ajout subcategorie
Route::get ('/admin/subcategory/new', 'Admin\SubcategoriesController@getNew')->name('subcategory_new');
Route::post ('/admin/subcategory/new', 'Admin\SubcategoriesController@getNew')->name('subcategory_new_post');

//Modification subcategorie
Route::get ('/admin/subcategory/edit/{category_id}', 'Admin\SubcategoriesController@getEdit')->name('subcategory_edit');
Route::post ('/admin/subcategory/edit', 'Admin\SubcategoriesController@postEdit')->name('subcategory_edit_post');

//Suppression subcategorie
Route::get ('/admin/subcategory/delete/{category_id}', 'Admin\SubcategoriesController@getDelete')->name('subcategory_delete');