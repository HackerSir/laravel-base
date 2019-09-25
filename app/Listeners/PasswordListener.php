<?php

namespace App\Listeners;

use App\User;
use Illuminate\Auth\Events\PasswordReset;

class PasswordListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 註冊監聽器的訂閱者。
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            PasswordReset::class,
            'App\Listeners\PasswordListener@onPasswordReset'
        );
    }

    public function onPasswordReset(PasswordReset $event)
    {
        /** @var User $user */
        $user = $event->user;
        //修改密碼已會產生紀錄，沒必要額外再紀錄清空 password_expired_at 的事件
        $user->disableLogging();
        $user->update([
            'password_expired_at' => null,
        ]);
        $user->enableLogging();
    }
}
