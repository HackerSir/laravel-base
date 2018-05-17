<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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

    /**
     * 測試大廳頁面
     *
     * @return void
     */
    public function testHallPage()
    {
        $this->visit(route('hall'))
            ->assertResponseStatus(200);
    }

    /**
     * 測試常見問題頁面
     *
     * @return void
     */
    public function testFaqPage()
    {
        $this->visit(route('faq'))
            ->assertResponseStatus(200);
    }

    /**
     * 測試隱私權條款頁面
     *
     * @return void
     */
    public function testPrivacyPolicyPage()
    {
        $this->visit(route('privacy-policy'))
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
