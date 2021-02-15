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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        //Route::group(['middleware' => ['auth']], function () {


        /* Route::get
         ('/', "HomeController@login");*/


    });


/** login  */

Route::post('/login1', "LoginController@login");
Route::post('/requestpwd', "LoginController@requestPwd");
Route::post('/login', "LoginController@requestPwd");
Route::post('/logout', "LoginController@logout");

Route::get
('/login', "LoginController@getLogin")->name('login');


Route::group(['middleware' => ['auth', 'checkcreneau']], function () {

    Route::get('/connect', 'HomeController@index');
    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');
    Route::get('roles/assign_permission', 'RoleController@getViewAssignPermission')
        ->name("getAssign.permission");
    Route::post('roles/assign_permission', 'RoleController@assignPermission')
        ->name("assign.permission");

    Route::resource('permissions', 'PermissionController');

    Route::any('logs', 'LogController@index');

});



Route::get
('/', "HomeController@home");
Route::get('/home', 'HomeController@home');

Route::any
('/products/{categorie_id}', "ProductController@index");
Route::get
('/detailsproduct/{product_id}', "ProductController@detail");
Route::post
('/searchproducts', "ProductController@searchproducts");

Route::get('cart', "CartController@show")->name('cart.show');
Route::post('cart/add/{product}', "CartController@add")->name('cart.add');
Route::get('cart/remove/{product}', "CartController@remove")->name('cart.remove');
Route::get('cart/empty', "CartController@empty")->name('cart.empty');
Route::post
('/updateqty', "CartController@updateqty");