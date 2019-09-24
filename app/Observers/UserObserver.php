<?php

namespace App\Observers;

use App\User;
use Carbon\Carbon;

class UserObserver
{
    /**
     * Handle the user "creating" event.
     *
     * @param \App\User $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->register_at = Carbon::now();
        $user->register_ip = request()->getClientIp();
        $user->last_login_at = Carbon::now();
        $user->last_login_ip = request()->getClientIp();
    }
}
