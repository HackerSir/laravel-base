<?php

namespace Tests\Feature;

use App\User;
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
}
