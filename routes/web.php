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


/*
|--------------------------------------------------------------------------
| MENU
|--------------------------------------------------------------------------
*/

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact/send', 'ContactController@send')->name('contact.send');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');
Route::get('/mention_legales', function () {
    return view('mention_legales');
})->name('mention_legales');
Route::get('/return_home', 'HomeController@redirect_home')->name('return_home');


/*
|--------------------------------------------------------------------------
| ADMIN INTERFACE
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','admin'])->group(function () {

    //Page d'accueil
    Route::get ('/admin/', 'Admin\HomeController@index')->name('admin_home');

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

    //Liste store
    Route::get ('/admin/store/list', 'Admin\StoresController@getAll')->name('store_list');

    //Ajout store
    Route::get ('/admin/store/new', 'Admin\StoresController@getNew')->name('store_new');
    Route::post ('/admin/store/new', 'Admin\StoresController@getNew')->name('store_new_post');

    //Modification store
    Route::get ('/admin/store/edit/{store_id}', 'Admin\StoresController@getEdit')->name('store_edit');
    Route::post ('/admin/store/edit', 'Admin\StoresController@postEdit')->name('store_edit_post');

    //Suppression store
    Route::get ('/admin/store/delete/{store_id}', 'Admin\StoresController@getDelete')->name('store_delete');

    //Liste user
    Route::get ('/admin/user/list', 'Admin\UsersController@getAll')->name('user_list');

    //Ajout user
    Route::get ('/admin/user/new', 'Admin\UsersController@getNew')->name('user_new');
    Route::post ('/admin/user/new', 'Admin\UsersController@getNew')->name('user_new_post');

    //Modification user
    Route::get ('/admin/user/edit/{store_id}', 'Admin\UsersController@getEdit')->name('user_edit');
    Route::post ('/admin/user/edit', 'Admin\UsersController@postEdit')->name('user_edit_post');

    //Suppression user
    Route::get ('/admin/user/delete/{user_id}', 'Admin\UsersController@getDelete')->name('user_delete');


    //Liste promotions
    Route::get ('/admin/promotion/list', 'Admin\PromotionsController@getAll')->name('promotion_list');

    //Ajout promotion
    Route::get ('/admin/promotion/new', 'Admin\PromotionsController@getNew')->name('promotion_new');
    Route::post ('/admin/promotion/new', 'Admin\PromotionsController@getNew')->name('promotion_new_post');

    //Modification promotion
    Route::get ('/admin/promotion/edit/{promotion_id}', 'Admin\PromotionsController@getEdit')->name('promotion_edit');
    Route::post ('/admin/promotion/edit', 'Admin\PromotionsController@postEdit')->name('promotion_edit_post');

    //Suppression promotion
    Route::get ('/admin/promotion/delete/{promotion_id}', 'Admin\PromotionsController@getDelete')->name('promotion_delete');

});



/*
|--------------------------------------------------------------------------
| MANAGER INTERFACE
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','manager'])->group(function () {
    //STORES
    Route::get('/manager/', 'ManagerController@getStores')->name('manager_home');

    Route::get('/manager/add_store', 'ManagerController@addStore')->name('manager_add_store');
    Route::post('/manager/add_store', 'ManagerController@addStore')->name('manager_add_store_post');

    Route::get('/manager/edit_store/{store_id}', 'ManagerController@getEditStore')->name('manager_edit_store');
    Route::post('/manager/edit_store', 'ManagerController@postEditStore')->name('manager_edit_store_post');

    Route::get ('/manager/delete_store/{store_id}', 'ManagerController@deleteStore')->name('manager_delete_store');

    //PROMOS
    Route::get('/manager/get_promos', 'ManagerController@getAllPromos')->name('manager_get_promos');

    Route::get('/manager/refresh_promos/{promo_id}/{activated}', 'ManagerController@refreshPromo')->name('manager_refresh_promo');

    Route::get('/manager/add_promo/{store_id}', 'ManagerController@addPromo')->name('manager_add_promo');
    Route::post('/manager/add_promo', 'ManagerController@addPromo')->name('manager_add_promo_post');

    Route::get('/test/', 'ManagerController@test')->name('test');

    //Manager edit account
    Route::get ('/manager/editAccount', 'Manager\AccountController@getEditAccount')->name('manager_edit_account');
    Route::post ('/manager/editAccount', 'Manager\AccountController@postEditAccount')->name('manager_edit_post_account');

    //Manager edit password
    Route::get ('/manager/editPassword', 'Manager\AccountController@getPassword')->name('manager_edit_password');
    Route::post ('/manager/editPassword', 'Manager\AccountController@getPassword')->name('manager_edit_post_password');
});




/*
|--------------------------------------------------------------------------
| USER INTERFACE
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','user'])->group(function () {
    //Page d'accueil
    Route::get ('/user/', 'User\HomeController@index')->name('user_home');
    Route::post('/user/promos_list', 'User\HomeController@printPromos')->name('print_promos');

    //User->GetPromo
    Route::post('/user/promo', 'User\CodePromosController@userGetPromo')->name('user_promotion_post');
    Route::get('/user/promo/{promo_id}', 'User\CodePromosController@userGetPromoGet')->name('user_promotion_get');

    //Favoris
    Route::get ('/user/favoris', 'User\FavorisController@getAll')->name('user_favoris');
    Route::post ('/user/favoris/delete', 'User\FavorisController@delete')->name('user_favoris_delete');
    Route::get ('/user/favoris/update/{store_id}/{user_id}', 'User\FavorisController@update')->name('user_favoris_update');

    //CodePromo
    Route::get ('/user/codePromo', 'User\CodePromosController@getAll')->name('user_codePromo');
    Route::get ('/user/codePromo/{store_id}/{user_id}/{promo_id}', 'User\CodePromosController@delete')->name('user_codePromo_delete');
    Route::post('/user/delPromoUser', 'User\CodePromosController@deletePromoUser')->name('del_promo_user');

    //User edit account
    Route::get ('/user/editAccount', 'User\AccountController@getEditAccount')->name('user_edit_account');
    Route::post ('/user/editAccount', 'User\AccountController@postEditAccount')->name('user_edit_post_account');

    //User edit password
    Route::get ('/user/editPassword', 'User\AccountController@getPassword')->name('user_edit_password');
    Route::post ('/user/editPassword', 'User\AccountController@getPassword')->name('user_edit_post_password');

    //User delete avis
    Route::post ('/user/avis/delete', 'User\HomeController@getDeleteAvis')->name('avis_delete');
    Route::post ('/user/avis/update', 'User\HomeController@updateAvis')->name('avis_update');

});


/*
|--------------------------------------------------------------------------
| STORE INTERFACE
|--------------------------------------------------------------------------
*/

Route::get ('store/{store_id}', 'StoreController@getDetails')->name('store_details');
Route::get ('promo/{promo_id}', 'PromotionController@formRating')->name('promo_rating')->middleware('auth', 'user');
Route::post ('promo/new', 'PromotionController@getNew')->name('rating_new');



/*
|--------------------------------------------------------------------------
| LES ROUTES DE MILOU
|--------------------------------------------------------------------------
*/
Route::post('/map/categories', 'Admin\CategoriesController@postSearchCategories')->name('categories_search_post');

Route::post('/map/cities', 'Admin\CitiesController@postSearchCities')->name('cities_search_post');

Route::post('/map/subcategories', 'Admin\SubCategoriesController@postSearchSubCategories')->name('subcategories_search_post');

Route::post('/map/stores', 'Admin\StoresController@postSearchStores')->name('stores_search_post');