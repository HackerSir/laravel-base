<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\BrowserKitTestCase;

class ProfileTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    /** @var User */
    private $user;

    protected function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    public function testGetProfile()
    {
        $this->actingAs($this->user)
            ->visit(route('profile'))
            ->see('個人資料');
    }

    public function testGetEditProfile()
    {
        $this->actingAs($this->user)
            ->visit(route('profile.edit'))
            ->see('編輯個人資料');
    }

    public function testUpdateProfile()
    {
        $this->actingAs($this->user)
            ->visit(route('profile.edit'))
            ->see('編輯個人資料')
            ->type('illya', 'name')
            ->press('確認')
            ->seePageIs(route('profile'))
            ->see($this->stringToxxxx('資料修改完成。'));

        $this->user->refresh();
        $this->assertEquals('illya', $this->user->name);
    }
}
