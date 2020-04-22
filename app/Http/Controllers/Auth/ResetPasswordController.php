<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
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

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        // 覆寫原方法，以加入 reCAPTCHA 的驗證規則
        return [
            'token'              => 'required',
            'email'              => 'required|email',
            'password'           => 'required|confirmed|min:8',
            recaptchaFieldName() => config('recaptcha.api_site_key') ? recaptchaRuleName() : '',
        ];
    }
}
