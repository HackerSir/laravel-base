<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\Services\MailService;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use Throttle;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $mailService;

    use AuthenticatesAndRegistersUsers, ThrottlesLogins {
        register as originalRegister;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @param MailService $mailService
     */
    public function __construct(MailService $mailService)
    {
        $this->middleware($this->guestMiddleware(), [
            'except' => [
                'logout',
                'emailConfirm',
                'resendConfirmMailPage',
                'resendConfirmMail',
            ],
        ]);

        $this->middleware('auth', [
            'only' => [
                'resendConfirmMailPage',
                'resendConfirmMail',
            ],
        ]);

        $this->mailService = $mailService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * 重新包裝註冊方法，以寄送驗證信件
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // 呼叫原始註冊方法
        $result = $this->originalRegister($request);
        /** @var User $user */
        $user = auth()->user();
        $this->generateConfirmCodeAndSendConfirmMail($user);
        // 紀錄註冊時間與IP
        $user->update([
            'register_at' => Carbon::now(),
            'register_ip' => $request->ip(),
        ]);
        // 賦予第一位註冊的人管理員權限
        if (User::count() == 1) {
            $admin = Role::where('name', '=', 'Admin')->first();
            $user->attachRole($admin);
        }

        // 回傳結果
        return $result->with('global', '註冊完成，請至信箱收取驗證信件。');
    }

    /**
     * 驗證信箱
     *
     * @param  \Illuminate\Http\Request $request
     * @param string $confirmCode
     * @return \Illuminate\Http\Response
     */
    public function emailConfirm(Request $request, $confirmCode)
    {
        //檢查驗證碼
        $user = User::where('confirm_code', $confirmCode)->whereNull('confirm_at')->first();
        if (!$user) {
            return redirect()->route('index')->with('warning', '驗證連結無效。');
        }
        //更新資料
        $user->update([
            'confirm_code' => null,
            'confirm_at'   => Carbon::now(),
        ]);

        return redirect()->route('index')->with('global', '信箱驗證完成。');
    }

    /**
     * 重送驗證信頁面
     *
     * @return \Illuminate\View\View
     */
    public function resendConfirmMailPage()
    {
        $user = auth()->user();
        if ($user->isConfirmed) {
            return redirect()->route('index');
        }

        return view('auth.resend-confirm-mail', compact('user'));
    }

    /**
     * 重送驗證信
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resendConfirmMail(Request $request)
    {
        //檢查冷卻時間（每次須等待5分鐘）
        $throttler = Throttle::get($request, 1, 5);
        if (!$throttler->attempt()) {
            return redirect()->route('auth.resend-confirm-mail')->with('warning', '信件請求過於頻繁，請等待5分鐘。');
        }
        $user = auth()->user();
        $this->generateConfirmCodeAndSendConfirmMail($user);

        return redirect()->route('index')->with('global', '驗證信件已重新發送。');
    }

    /**
     * 產生驗證代碼並發送驗證信件
     *
     * @param User $user
     */
    public function generateConfirmCodeAndSendConfirmMail(User $user)
    {
        //產生驗證碼
        $confirmCode = str_random(60);
        //產生驗證連結
        $link = route('auth.confirm', $confirmCode);
        //發送驗證郵件
        $this->mailService->sendEmailConfirmation($user, $link);
        //記錄驗證碼
        $user->update([
            'confirm_code' => $confirmCode,
        ]);
    }
}
