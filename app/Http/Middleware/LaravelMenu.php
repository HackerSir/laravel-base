<?php

namespace App\Http\Middleware;

use Closure;
use Entrust;
use Menu;

class LaravelMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //左側
        Menu::make('left', function ($menu) {
            /* @var \Lavary\Menu\Builder $menu */
            $menu->add('首頁', ['route' => 'index']);
        });
        //右側
        Menu::make('right', function ($menu) {
            /* @var \Lavary\Menu\Builder $menu */
            //會員
            if (auth()->check()) {
                if (!auth()->user()->isConfirmed) {
                    $menu->add(
                        '<i class="ui icon alarm red"></i> 尚未完成信箱驗證',
                        [
                            'route' => 'auth.resend-confirm-mail',
                            //FIXME: menu的a.item無法透過顏色class直接設定顏色
                            'class' => 'red',
                        ]
                    );
                }
                //管理員
                if (Entrust::can('menu.view') and auth()->user()->isConfirmed) {
                    /** @var \Lavary\Menu\Builder $adminMenu */
                    $adminMenu = $menu->add('管理選單', 'javascript:void(0)');

                    if (Entrust::can(['user.manage', 'user.view'])) {
                        $adminMenu->add('會員清單', ['route' => 'user.index'])->active('user/*');
                    }

                    if (Entrust::can('role.manage')) {
                        $adminMenu->add('角色管理', ['route' => 'role.index']);
                    }

                    if (Entrust::can('log-viewer.access')) {
                        $adminMenu->add(
                            '記錄檢視器 <i class="external icon"></i>',
                            ['route' => 'log-viewer::dashboard']
                        )->link->attr('target', '_blank');
                    }
                }
                /** @var \Lavary\Menu\Builder $userMenu */
                $userMenu = $menu->add(auth()->user()->name, 'javascript:void(0)');
                $userMenu->add('個人資料', ['route' => 'profile'])->active('profile/*');
                $userMenu->add('登出', ['action' => 'Auth\AuthController@logout']);
            } else {
                //遊客
                $menu->add('登入', ['action' => 'Auth\AuthController@showLoginForm']);
            }
        });

        return $next($request);
    }
}
