<?php

namespace App\Http\Middleware;

use Closure;

class EmailConfirm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = auth()->guard($guard)->user();
        if (!$user->isConfirmed) {
            //跳轉至重送驗證信頁面
            return redirect()->route('auth.resend-confirm-mail')->with('warning', '尚未完成信箱驗證');
        }

        return $next($request);
    }
}
