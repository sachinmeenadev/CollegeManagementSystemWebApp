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
Route::prefix('admin')->group(function () {
    //Role Creation Routes
    Route::prefix('/roles')->group(function () {
        Route::get('/', [
            'as' => 'apiAdminGetRole',
            'uses' => 'Api\AdminController@getRole'
        ]);
        Route::post('/', [
            'as' => 'apiAdminInsertRole',
            'uses' => 'Api\AdminController@insertRole'
        ]);
        Route::put('/{id}', [
            'as' => 'apiAdminUpdateRole',
            'uses' => 'Api\AdminController@updateRole'
        ]);
        Route::delete('/{id}', [
            'as' => 'apiAdminDeleteRole',
            'uses' => 'Api\AdminController@deleteRole'
        ]);
    });
    //=========================================================//
    //User Creation Routes
    Route::prefix('/users')->group(function () {
        Route::get('/', [
            'as' => 'apiAdminGetUser',
            'uses' => 'Api\AdminController@getUser'
        ]);
        Route::post('/', [
            'as' => 'apiAdminInsertUser',
            'uses' => 'Api\AdminController@insertUser'
        ]);
        Route::put('/{id}', [
            'as' => 'apiAdminUpdateUser',
            'uses' => 'Api\AdminController@updateUser'
        ]);
        Route::delete('/{id}', [
            'as' => 'apiAdminDeleteUser',
            'uses' => 'Api\AdminController@deleteUser'
        ]);
    });
    //=========================================================//
    //College Branch Creation Routes
    Route::prefix('/branches')->group(function () {
        Route::get('/', [
            'as' => 'apiAdminGetBranch',
            'uses' => 'Api\AdminController@getBranch'
        ]);
        Route::post('/', [
            'as' => 'apiAdminInsertBranch',
            'uses' => 'Api\AdminController@insertBranch'
        ]);
        Route::put('/{id}', [
            'as' => 'apiAdminUpdateBranch',
            'uses' => 'Api\AdminController@updateBranch'
        ]);
        Route::delete('/{id}', [
            'as' => 'apiAdminDeleteBranch',
            'uses' => 'Api\AdminController@deleteBranch'
        ]);
    });
    //=========================================================//
    //Subject Creation Routes
    Route::prefix('/subjects')->group(function () {
        Route::get('/', [
            'as' => 'apiAdminGetSubject',
            'uses' => 'Api\AdminController@getSubject'
        ]);
        Route::post('/', [
            'as' => 'apiAdminInsertSubject',
            'uses' => 'Api\AdminController@insertSubject'
        ]);
        Route::put('/{id}', [
            'as' => 'apiAdminUpdateSubject',
            'uses' => 'Api\AdminController@updateSubject'
        ]);
        Route::delete('/{id}', [
            'as' => 'apiAdminDeleteSubject',
            'uses' => 'Api\AdminController@deleteSubject'
        ]);
    });
    //=========================================================//
});
