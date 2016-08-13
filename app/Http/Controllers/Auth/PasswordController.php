<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectPath = '/';
    /* @var \App\User $user */
    protected $user;

    /**
     * Create a new password controller instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->user = $request->user();
        $this->middleware('guest', [
            'except' => [
                'getChangePassword',
                'updatePassword',
            ],
        ]);

        $this->middleware('email', [
            'only' => [
                'getChangePassword',
                'updatePassword',
            ],
        ]);
    }

    /**
     * 密碼修改頁面
     *
     * @return \Illuminate\View\View
     */
    public function getChangePassword()
    {
        return view('auth.passwords.change-password', ['user' => $this->user]);
    }

    /**
     * 修改密碼
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        //檢查原密碼
        if (!Hash::check($request->get('password'), $this->user->getAuthPassword())) {
            return redirect()->route('auth.change-password')->withErrors(['password' => '輸入有誤，請重新輸入。']);
        }
        //檢查新密碼
        $this->validate($request, [
            'new_password' => 'required|confirmed|min:6',
        ]);
        //更新密碼
        $this->user->update([
            'password' => bcrypt($request->get('new_password')),
        ]);

        return redirect()->route('profile')->with('global', '密碼修改完成。');
    }
}
