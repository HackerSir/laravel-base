<?php

namespace App\Observers;

use App\Role;
use App\User;
use Carbon\Carbon;

class UserObserver
{
    /**
     * Handle the user "creating" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->register_at = Carbon::now();
        $user->register_ip = request()->getClientIp();
        $user->last_login_at = Carbon::now();
        $user->last_login_ip = request()->getClientIp();
    }

    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if (User::count() <= 1) {
            // 若是第一個註冊的，直接給予管理員權限
            $admin = Role::whereName('Admin')->first();
            $user->attachRole($admin);
        }
    }
}
