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

Route::prefix('admin')->group(function () {
    Route::get('roles', [
        'as' => 'apiAdminRole',
        'uses' => 'Api\AdminController@getRoles'
    ]);
});