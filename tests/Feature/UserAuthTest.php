<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\BrowserKitTestCase;

class UserAuthTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testUserLoginSuccess()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $this->visit(route('login'))
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press('登入')
            ->seePageIs('/');
    }

    public function testRegisterSuccess()
    {
        $userEmail = 'example@example.com';

        $this->visit(route('register'))
            ->type('example', 'name')
            ->type($userEmail, 'email')
            ->type('secret78', 'password')
            ->type('secret78', 'password_confirmation')
            ->press('註冊')
            ->seePageIs('/');
    }

    public function testConfirmCode()
    {
        /** @var User $user */
        $user = factory(User::class)->states('NoMailConfirm')->create();

        // 產生驗證碼
        $confirmCode = str_random(60);

        // 記錄驗證碼
        $user->update([
            'confirm_code' => $confirmCode,
        ]);

        $url = route('confirm', $user->confirm_code);

        $this->visit($url)
            ->seePageIs('/')
            ->see($this->stringToxxxx('信箱驗證完成。'));

        // 確認驗整碼有被清空
        $user->refresh(); // 更新資料
        $this->assertNull($user->confirm_code);

        // 再訪問一次，應該會顯示"驗證連結無效"
        $this->visit($url)
            ->seePageIs('/')
            ->see($this->stringToxxxx('驗證連結無效。'));
    }

    public function testResendConfirmMailPage()
    {
        /** @var User $user */
        $user = factory(User::class)->states('NoMailConfirm')->create();

        $this->actingAs($user)
            ->visit(route('confirm-mail.resend'))
            ->seePageIs('resend')
            ->press('發送驗證信件');

        $user->confirm_at = Carbon::now();
        $this->actingAs($user)
            ->visit(route('confirm-mail.resend'))
            ->seePageIs('/');
    }

    public function testConfirmMailRedirect()
    {
        /** @var User $user */
        $user = factory(User::class)->states('NoMailConfirm')->create();

        $this->actingAs($user)
            ->visit(route('profile'))
            ->seePageIs(route('confirm-mail.resend'))
            ->see($this->stringToxxxx('尚未完成信箱驗證'));
    }

    public function testRedirectIfAuthenticated()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit(route('login'))
            ->seePageIs('/');
    }
}
