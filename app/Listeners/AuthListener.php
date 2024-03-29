<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class AuthListener
{
    /**
     * 註冊監聽器的訂閱者。
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\AuthListener@onLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\AuthListener@onLogout'
        );
    }

    /**
     * 使用者登入
     *
     * @param  Login  $event
     */
    public function onLogin(Login $event)
    {
        /* @var \App\User $user */
        $user = $event->user;
        $ip = request()->getClientIp();
        //更新最後登入時間與IP
        $user->update([
            'last_login_at' => Carbon::now(),
            'last_login_ip' => $ip,
        ]);

        //寫入紀錄
        activity('auth')->by($user)->log(':causer.name (:causer.email) 登入');
    }

    /**
     * 使用者登出
     *
     * @param  Logout  $event
     */
    public function onLogout(Logout $event)
    {
        /* @var \App\User $user */
        $user = $event->user;
        if (!$user) {
            return;
        }

        //寫入紀錄
        activity('auth')->by($user)->log(':causer.name (:causer.email) 登出');
    }
}
