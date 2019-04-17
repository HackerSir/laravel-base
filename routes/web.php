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
    //角色管理
    //權限：role.manage
    Route::group(['middleware' => 'permission:role.manage'], function () {
        Route::resource('role', 'RoleController', [
            'except' => [
                'show',
            ],
        ]);
    });
    //個人資料
    Route::group(['prefix' => 'profile'], function () {
        //查看個人資料
        Route::get('/', 'ProfileController@index')->name('profile');
        //編輯個人資料
        Route::get('edit', 'ProfileController@edit')->name('profile.edit');
        Route::put('update', 'ProfileController@update')->name('profile.update');
    });
});

//會員系統
Auth::routes(['verify' => true]);
Route::group(['namespace' => 'Auth'], function () {
    //修改密碼
    Route::get('password/change', 'PasswordController@getChangePassword')->name('password.change');
    Route::put('password/change', 'PasswordController@putChangePassword')->name('password.change');
});
