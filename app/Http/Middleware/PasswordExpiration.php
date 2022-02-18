<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class PasswordExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var User $user */
        $user = $request->user();
        if ($user && $user->is_password_expired) {
            // 密碼已到期
            $routeName = $request->route()->getName();
            // 僅能重設密碼或登出
            if (!in_array($routeName, ['password.change', 'logout'])) {
                return redirect()->route('password.change');
            }
        }

        return $next($request);
    }
}
