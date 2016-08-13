<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//會員（須完成信箱驗證）
Route::group(['middleware' => ['auth', 'email']], function () {
    //會員管理
    //權限：user.manage、user.view
    Route::resource('user', 'UserController', [
        'except' => [
            'create',
            'store',
        ],
    ]);
    //角色管理
    //權限：role.manage
    Route::group(['middleware' => 'permission:role.manage'], function () {
        Route::resource('role', 'RoleController', [
            'except' => [
                'show',
            ],
        ]);
    });
    //會員資料
    Route::group(['prefix' => 'profile'], function () {
        //查看會員資料
        Route::get('/', 'ProfileController@getProfile')->name('profile');
        //編輯會員資料
        Route::get('edit', 'ProfileController@getEditProfile')->name('profile.edit');
        Route::put('update', 'ProfileController@updateProfile')->name('profile.update');
    });
});

//會員系統
//將 Route::auth() 複製出來自己命名
Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'AuthController@showLoginForm')->name('auth.login');
    Route::post('login', 'AuthController@login')->name('auth.login');
    Route::get('logout', 'AuthController@logout')->name('auth.logout');
    // Registration Routes...
    Route::get('register', 'AuthController@showRegistrationForm')->name('auth.register');
    Route::post('register', 'AuthController@register')->name('auth.register');
    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'PasswordController@showResetForm')->name('auth.password.reset');
    Route::post('password/email', 'PasswordController@sendResetLinkEmail')->name('auth.password.email');
    Route::post('password/reset', 'PasswordController@reset')->name('auth.password.reset');
    //修改密碼
    Route::get('change-password', 'PasswordController@getChangePassword')->name('auth.change-password');
    Route::put('update-password', 'PasswordController@updatePassword')->name('auth.update-password');
    //驗證信箱
    Route::get('resend', 'AuthController@resendConfirmMailPage')->name('auth.resend-confirm-mail');
    Route::post('resend', 'AuthController@resendConfirmMail')->name('auth.resend-confirm-mail');
    Route::get('confirm/{confirmCode}', 'AuthController@emailConfirm')->name('auth.confirm');
});

//首頁
Route::get('/', function () {
    return view('index');
})->name('index');
