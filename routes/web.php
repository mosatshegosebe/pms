<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('store.front.index');
});

Route::group(['prefix' => 'store', 'as' => 'store.'], function () {
    Route::resource('front', 'StoreFrontController')->only(['index', 'show']);
    Route::resource('bid', 'BidController')->only(['index', 'store']);
});

Auth::routes();

Route::group(['middleware' => 'auth:web'], function() {

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', 'DashboardController@index')->name('home');
        Route::resource('products', 'ProductsController');
    });
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('clients', 'ClientController');

});
