<?php

use Illuminate\Support\Facades\Route;

/*
|---------------------------------- ----------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "Validation Error";
});

Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('api.login');
Route::post('/me', 'App\Http\Controllers\AuthController@me')->name('api.me');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('api.logout');

Route::prefix('image')->group(function() {
    Route::get('/{path}', 'App\Http\Controllers\ImagesController@index')->where('path', '.*');
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth', 'check.rules', 'cors']], function () {

    Route::group(['namespace' => 'Group', 'prefix' => 'group'], function () {
        Route::get('/list', 'ListController')->name('group.list');
        Route::post('/show', 'ShowController')->name('group.show');
        Route::post('/store', 'StoreController')->name('group.store');
        Route::post('/update', 'UpdateController')->name('group.update');
        Route::post('/delete', 'DeleteController')->name('group.delete');
        Route::get('/rules', 'RulesController')->name('group.rules');
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

    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function () {
        Route::get('/list', 'ListController')->name('category.list');
        Route::post('/show', 'ShowController')->name('category.show');
        Route::post('/store', 'StoreController')->name('category.store');
        Route::post('/update', 'UpdateController')->name('category.update');
        Route::post('/delete', 'DeleteController')->name('category.delete');
    });

    Route::group(['namespace' => 'Base', 'prefix' => 'base'], function () {
        Route::get('/list', 'ListController')->name('base.list');
        Route::post('/show', 'ShowController')->name('base.show');
        Route::post('/store', 'StoreController')->name('base.store');
        Route::post('/update', 'UpdateController')->name('base.update');
        Route::post('/delete', 'DeleteController')->name('base.delete');
    });

    Route::group(['namespace' => 'Sklad', 'prefix' => 'sklad'], function () {
        Route::get('/list', 'ListController')->name('sklad.list');
        Route::post('/show', 'ShowController')->name('sklad.show');
        Route::post('/store', 'StoreController')->name('sklad.store');
        Route::post('/update', 'UpdateController')->name('sklad.update');
        Route::post('/delete', 'DeleteController')->name('sklad.delete');
    });

    Route::group(['namespace' => 'Config', 'prefix' => 'config'], function () {
        Route::get('/list', 'ListController')->name('config.list');
        Route::post('/show', 'ShowController')->name('config.show');
        Route::post('/pdf', 'ConfigController@pdf')->name('config.pdf');
        Route::post('/store', 'StoreController')->name('config.store');
        Route::post('/update', 'UpdateController')->name('config.update');
        Route::post('/delete', 'DeleteController')->name('config.delete');
    });

    Route::group(['namespace' => 'Setting', 'prefix' => 'setting'], function () {
        Route::get('/list', 'ListController')->name('setting.list');
        Route::post('/update', 'UpdateController')->name('setting.update');
    });

    Route::group(['namespace' => 'ConfigScene', 'prefix' => 'config_scene'], function () {
        Route::get('/list', 'ListController')->name('config_scene.list');
        Route::post('/show', 'ShowController')->name('config_scene.show');
        Route::post('/store', 'StoreController')->name('config_scene.store');
        Route::post('/update', 'UpdateController')->name('config_scene.update');
        Route::post('/delete', 'DeleteController')->name('config_scene.delete');
    });

    Route::group(['namespace' => 'ConfigAssembling', 'prefix' => 'config_assembling'], function () {
        Route::get('/list', 'ListController')->name('config_assembling.list');
        Route::post('/table', 'ConfigAssemblingController@index')->name('config_assembling.table');
        Route::post('/show', 'ShowController')->name('config_assembling.show');
        Route::post('/store', 'StoreController')->name('config_assembling.store');
        Route::post('/update', 'UpdateController')->name('config_assembling.update');
        Route::post('/delete', 'DeleteController')->name('config_assembling.delete');
    });

    Route::group(['namespace' => 'ConfigProject', 'prefix' => 'config_project'], function () {
        Route::get('/list', 'ListController')->name('config_project.list');
        Route::post('/show', 'ShowController')->name('config_project.show');
        Route::post('/store', 'StoreController')->name('config_project.store');
        Route::post('/update', 'UpdateController')->name('config_project.update');
        Route::post('/delete', 'DeleteController')->name('config_project.delete');
    });

    Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
        Route::get('/list', 'ListController')->name('product.list');
        Route::post('/show', 'ShowController')->name('product.show');
        Route::post('/store', 'StoreController')->name('product.store');
        Route::post('/update', 'UpdateController')->name('product.update');
        Route::post('/delete', 'DeleteController')->name('product.delete');
    });

    Route::group(['namespace' => 'Collection', 'prefix' => 'collection'], function () {
        Route::get('/list', 'ListController')->name('collection.list');
        Route::post('/show', 'ShowController')->name('collection.show');
        Route::post('/store', 'StoreController')->name('collection.store');
        Route::post('/update', 'UpdateController')->name('collection.update');
        Route::post('/delete', 'DeleteController')->name('collection.delete');
    });

    Route::group(['namespace' => 'Supplier', 'prefix' => 'supplier'], function () {
        Route::get('/list', 'ListController')->name('supplier.list');
        Route::post('/show', 'ShowController')->name('supplier.show');
        Route::post('/store', 'StoreController')->name('supplier.store');
        Route::post('/update', 'UpdateController')->name('supplier.update');
        Route::post('/delete', 'DeleteController')->name('supplier.delete');
    });

    Route::group(['namespace' => 'Correction', 'prefix' => 'correction'], function () {
        Route::get('/list', 'ListController')->name('correction.list');
        Route::post('/show', 'ShowController')->name('correction.show');
        Route::post('/store', 'StoreController')->name('correction.store');
        Route::post('/update', 'UpdateController')->name('correction.update');
        Route::post('/delete', 'DeleteController')->name('correction.delete');
    });

    Route::group(['namespace' => 'ButtonCategory', 'prefix' => 'button_category'], function () {
        Route::get('/list', 'ListController')->name('button_category.list');
        Route::post('/show', 'ShowController')->name('button_category.show');
        Route::post('/store', 'StoreController')->name('button_category.store');
        Route::post('/update', 'UpdateController')->name('button_category.update');
        Route::post('/delete', 'DeleteController')->name('button_category.delete');
    });

    Route::group(['namespace' => 'Grouping', 'prefix' => 'grouping'], function () {
        Route::get('/list', 'ListController')->name('grouping.list');
        Route::post('/show', 'ShowController')->name('grouping.show');
        Route::post('/store', 'StoreController')->name('grouping.store');
        Route::post('/update', 'UpdateController')->name('grouping.update');
        Route::post('/delete', 'DeleteController')->name('grouping.delete');
    });

    Route::group(['namespace' => 'ProductComposition', 'prefix' => 'pc'], function () {
        Route::get('/list', 'ListController')->name('pc.list');
        Route::post('/show', 'ShowController')->name('pc.show');
        Route::post('/store', 'StoreController')->name('pc.store');
        Route::post('/update', 'UpdateController')->name('pc.update');
        Route::post('/delete', 'DeleteController')->name('pc.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], function () {
        Route::get('/list', 'ListController')->name('tag.list');
        Route::post('/show', 'ShowController')->name('tag.show');
        Route::post('/store', 'StoreController')->name('tag.store');
        Route::post('/update', 'UpdateController')->name('tag.update');
        Route::post('/delete', 'DeleteController')->name('tag.delete');
    });

    Route::group(['namespace' => 'BaseLoop', 'prefix' => 'base_loop'], function () {
        Route::get('/list', 'ListController')->name('base_loop.list');
        Route::post('/show', 'ShowController')->name('base_loop.show');
        Route::post('/store', 'StoreController')->name('base_loop.store');
        Route::post('/update', 'UpdateController')->name('base_loop.update');
        Route::post('/delete', 'DeleteController')->name('base_loop.delete');
    });

    Route::group(['namespace' => 'BaseHandle', 'prefix' => 'base_handle'], function () {
        Route::get('/list', 'ListController')->name('base_handle.list');
        Route::post('/show', 'ShowController')->name('base_handle.show');
        Route::post('/store', 'StoreController')->name('base_handle.store');
        Route::post('/update', 'UpdateController')->name('base_handle.update');
        Route::post('/delete', 'DeleteController')->name('base_handle.delete');
    });

    Route::group(['namespace' => 'BaseFastener', 'prefix' => 'base_fastener'], function () {
        Route::get('/list', 'ListController')->name('base_fastener.list');
        Route::post('/show', 'ShowController')->name('base_fastener.show');
        Route::post('/store', 'StoreController')->name('base_fastener.store');
        Route::post('/update', 'UpdateController')->name('base_fastener.update');
        Route::post('/delete', 'DeleteController')->name('base_fastener.delete');
    });

    Route::group(['namespace' => 'BaseDoorstep', 'prefix' => 'base_doorstep'], function () {
        Route::get('/list', 'ListController')->name('base_doorstep.list');
        Route::post('/show', 'ShowController')->name('base_doorstep.show');
        Route::post('/store', 'StoreController')->name('base_doorstep.store');
        Route::post('/update', 'UpdateController')->name('base_doorstep.update');
        Route::post('/delete', 'DeleteController')->name('base_doorstep.delete');
    });

    Route::group(['namespace' => 'BaseMagnet', 'prefix' => 'base_magnet'], function () {
        Route::get('/list', 'ListController')->name('base_magnet.list');
        Route::post('/show', 'ShowController')->name('base_magnet.show');
        Route::post('/store', 'StoreController')->name('base_magnet.store');
        Route::post('/update', 'UpdateController')->name('base_magnet.update');
        Route::post('/delete', 'DeleteController')->name('base_magnet.delete');
    });

    Route::group(['namespace' => 'BaseCondition', 'prefix' => 'base_condition'], function () {
        Route::get('/list', 'ListController')->name('base_conditions.list');
        Route::post('/show', 'ShowController')->name('base_conditions.show');
        Route::post('/store', 'StoreController')->name('base_conditions.store');
        Route::post('/update', 'UpdateController')->name('base_conditions.update');
        Route::post('/delete', 'DeleteController')->name('base_conditions.delete');
    });

    Route::group(['namespace' => 'Condition', 'prefix' => 'condition'], function () {
        Route::get('/list', 'ListController')->name('conditions.list');
        Route::post('/show', 'ShowController')->name('conditions.show');
        Route::post('/store', 'StoreController')->name('conditions.store');
        Route::post('/update', 'UpdateController')->name('conditions.update');
        Route::post('/delete', 'DeleteController')->name('conditions.delete');
    });

    Route::group(['namespace' => 'ConfigGrouping', 'prefix' => 'config_grouping'], function () {
        Route::get('/list', 'ListController')->name('config_grouping.list');
        Route::post('/show', 'ShowController')->name('config_grouping.show');
        Route::post('/store', 'StoreController')->name('config_grouping.store');
        Route::post('/update', 'UpdateController')->name('config_grouping.update');
        Route::post('/delete', 'DeleteController')->name('config_grouping.delete');
    });
});
