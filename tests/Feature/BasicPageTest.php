<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\BrowserKitTestCase;

class BasicPageTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    /**
     * 測試首頁
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->visit(route('index'))
            ->assertResponseStatus(200);
    }

    public function testNavbar()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        // 賦予所有角色，盡量顯示所有項目
        $roles = Role::all();
        foreach ($roles as $role) {
            $user->attachRole($role);
        }

        $this->actingAs($user)
            ->visit(route('index'))
            ->assertResponseStatus(200);
    }
}
