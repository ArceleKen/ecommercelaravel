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
('/', "LoginController@getLogin");

Route::get
('/login', "LoginController@getLogin")->name('login');


Route::group(['middleware' => ['auth', 'checkcreneau']], function () {

    Route::get('/home', 'HomeController@index');
    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');
    Route::get('roles/assign_permission', 'RoleController@getViewAssignPermission')
        ->name("getAssign.permission");
    Route::post('roles/assign_permission', 'RoleController@assignPermission')
        ->name("assign.permission");

    Route::resource('permissions', 'PermissionController');

    Route::any('logs', 'LogController@index');

    Route::any('checkcompte', "DigiCareController@checkcompte");
    Route::any('checkrequette', "DigiCareController@checkrequette");
    Route::any('checktransaction', "DigiCareController@checktransaction");
    Route::any('checkticket', "DigiCareController@checkticket");
    Route::any('checkcallingcard', "DigiCareController@checkcallingcard");
    Route::any('checkopentickets', "DigiCareController@checkopentickets");

    Route::post('initcompte', "DigiCareController@initcompte");

    Route::get('initcompte', "DigiCareController@initcompteform");

    Route::post('newticket', "DigiCareController@newticket");

    Route::get('newticket', "DigiCareController@newticketForm");

    Route::get('checkmomolocalization', "LocalizationController@getmomolocalization");
    Route::get('checkomlocalization', "LocalizationController@getomlocalization");
    Route::get('checkeulocalization', "LocalizationController@geteulocalization");
    Route::get('checkmtntopuplocalization', "LocalizationController@getmtntopuplocalization");
    Route::get('checkorangetopuplocalization', "LocalizationController@getorangetopuplocalization");
    Route::get('checknextteltopuplocalization', "LocalizationController@getnextteltopuplocalization");
    Route::get('checkyoomeelocalization', "LocalizationController@getyoomeelocalization");
    Route::get('checkcamtellocalization', "LocalizationController@getcamtellocalization");
    Route::get('checkinvoiceslocalization', "LocalizationController@getinvoiceslocalization");

    Route::post('transactionlocalization', "LocalizationController@transactionlocalization");
    //Route::post('checkmtntopuplocalization', "LocalizationController@checkmtntopuplocalization");    
    //Route::post('checkyoomeelocalization', "LocalizationController@checkyoomeelocalization");

});

//Route::get('test', "LocalizationController@test");
//Route::post('checkmomolocalization', "LocalizationController@checkmomolocalization");

