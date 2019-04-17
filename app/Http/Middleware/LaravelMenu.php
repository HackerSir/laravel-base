<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Laratrust;
use Lavary\Menu\Builder;
use Menu;

class LaravelMenu
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //左側
        Menu::make('left', function (Builder $menu) {
        });

        Menu::make('right', function (Builder $menu) {
            if (auth()->check()) {
                /** @var User $user */
                $user = auth()->user();
                // 會員

                // 信箱驗證
                if (!$user->hasVerifiedEmail()) {
                    $menu->add('尚未完成信箱驗證', ['route' => 'verification.notice'])
                        ->link->attr(['class' => 'text-danger']);
                }

//                // 管理員
//                if (Laratrust::can('menu.view') && $user->hasVerifiedEmail()) {
//                    /** @var \Lavary\Menu\Builder $adminMenu */
//                    $adminMenu = $menu->add('管理選單', 'javascript:void(0)');
//
//                    if (Laratrust::can('user.manage')) {
//                        $adminMenu->add('會員管理', ['route' => 'user.index'])->active('user/*');
//                    }
//                    if (Laratrust::can('role.manage')) {
//                        $adminMenu->add('角色管理', ['route' => 'role.index'])->active('role/*');
//                    }
//
//                    if (Laratrust::can('log-viewer.access')) {
//                        $adminMenu->add(
//                            '記錄檢視器 <i class="fas fa-external-link-alt" aria-hidden="true"></i>',
//                            ['route' => 'log-viewer::dashboard']
//                        )->link->attr('target', '_blank');
//                    }
//
//                    if (Laratrust::can('telescope.access')) {
//                        $adminMenu->add(
//                            'Telescope <i class="fas fa-external-link-alt" aria-hidden="true"></i>',
//                            ['url' => config('telescope.path')]
//                        )->link->attr('target', '_blank');
//                    }
//                }

                /** @var \Lavary\Menu\Builder $userMenu */
                $userMenu = $menu->add(auth()->user()->name, 'javascript:void(0)');
//                $userMenu->add('個人資料', ['route' => 'profile'])->active('profile/*');
                $userMenu->add('登出', 'javascript:void(0)')
                    ->link
                    ->attr('onclick', 'event.preventDefault(); document.getElementById(\'logout-form\').submit();');
            } else {
                // 遊客
                $menu->add('登入', ['route' => 'login']);
            }
        });

        return $next($request);
    }

    protected function addDivider(\Lavary\Menu\Item $subMenu)
    {
        $lastItem = $subMenu->children()->last();
        if ($lastItem) {
            $lastItem->divide();
        }
    }
}
