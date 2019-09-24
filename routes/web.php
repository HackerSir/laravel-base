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

Route::view('/', 'index')->name('index');

//會員（須完成信箱驗證）
Route::group(['middleware' => ['auth', 'verified']], function () {
    //個人資料
    Route::group(['prefix' => 'profile'], function () {
        //查看個人資料
        Route::get('/', 'ProfileController@index')->name('profile');
        //編輯個人資料
        Route::get('edit', 'ProfileController@edit')->name('profile.edit');
        Route::put('update', 'ProfileController@update')->name('profile.update');
    });
});

Auth::routes(['verify' => true, 'register' => (bool) config('app-extend.allow-register')]);
