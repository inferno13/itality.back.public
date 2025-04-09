<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

/*Route::group([
    'middleware' => 'api',
    //'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login')->name('api.login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout')->name('api.logout');
    //Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me')->name('api.me');
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth', 'check.rules', 'cors']], function () {

    Route::post('me', 'App\Http\Controllers\AuthController@me')->name('api.me');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout')->name('api.logout');


    Route::group(['namespace' => 'Group', 'prefix' => 'group'], function () {
        Route::get('/list', 'ListController')->name('group.list');
        Route::post('/show', 'ShowController')->name('group.show');
        Route::post('/store', 'StoreController')->name('group.store');
        Route::post('/update', 'UpdateController')->name('group.update');
        Route::post('/delete', 'DeleteController')->name('group.delete');
    });


    Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
        Route::get('/list', 'ListController')->name('user.list');
        Route::post('/show', 'ShowController')->name('user.show');
        Route::post('/update', 'UpdateController')->name('user.update');
        Route::post('/store', 'StoreController')->name('user.store');
        Route::post('/delete', 'DeleteController')->name('user.delete');
    });

    Route::group(['namespace' => 'Order', 'prefix' => 'order'], function () {
        Route::get('/list', 'ListController')->name('order.list');
        Route::post('/show', 'ShowController')->name('order.show');
        Route::post('/store', 'StoreController')->name('order.store');
        Route::post('/update', 'UpdateController')->name('order.update');
        Route::post('/delete', 'DeleteController')->name('order.delete');
    });
});*/
