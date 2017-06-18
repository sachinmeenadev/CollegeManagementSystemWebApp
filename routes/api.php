<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->post('/login', [
    'as' => 'appLogin',
    'uses' => 'Api\LoginController@login'
]);

Route::middleware('api')->post('/register', [
    'as' => 'appRegister',
    'uses' => 'Api\LoginController@register'
]);
//==========================================================//
/*
|--------------------------------------------------------------
| For all Admin routes
|--------------------------------------------------------------
|Here we will have all the routes for Admin panel of Mobile Application
*/
//Role Creation Routes
Route::prefix('admin')->group(function () {
    Route::get('roles', [
        'as' => 'apiAdminGetRole',
        'uses' => 'Api\AdminController@getRole'
    ]);
    Route::post('roles', [
        'as' => 'apiAdminInsertRole',
        'uses' => 'Api\AdminController@insertRole'
    ]);
    Route::put('roles/{id}', [
        'as' => 'apiAdminUpdateRole',
        'uses' => 'Api\AdminController@updateRole'
    ]);
    Route::delete('roles/{id}', [
        'as' => 'apiAdminDeleteRole',
        'uses' => 'Api\AdminController@deleteRole'
    ]);
});
//=========================================================//