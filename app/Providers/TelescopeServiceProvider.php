<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\EntryType;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Telescope::night();

        Telescope::filter(function (IncomingEntry $entry) {
            //不記錄 Tracy Bar 的請求
            /* @see https://github.com/laravel/telescope/issues/101#issuecomment-432540360 */
            if ($entry->type === EntryType::REQUEST
                && isset($entry->content['uri'])
                && str_contains($entry->content['uri'], 'tracy/bar')) {
                return false;
            }

            //環境為 local 時，記錄所有事件
            if ($this->app->environment('local')) {
                return true;
            }

            //只記錄部分類型事件
            return $entry->isReportableException() ||
                $entry->isFailedJob() ||
                $entry->isScheduledTask() ||
                $entry->hasMonitoredTag();
        });
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user) {
            /** @var User $user */
            return $user->can('telescope.access');
        });
    }
}
