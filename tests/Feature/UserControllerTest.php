<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\BrowserKitTestCase;

class UserControllerTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function testIndex()
    {
        /** @var User $user */
        $user = factory(User::class)->create();

        $adminRole = Role::where('name', '=', 'Admin')->first();
        $user->attachRole($adminRole);

        $this->actingAs($user)
            ->visit(route('user.index'))
            ->see('會員清單');
    }
}