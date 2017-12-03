<?php

namespace App\Providers;

use Carbon\Carbon;
use Form;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\SlackHandler;
use Monolog\Logger;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //Carbon語系
        Carbon::setLocale(env('APP_LOCALE', 'en'));

        //Slack通知
        $slackEnable = env('SLACK_ENABLE', false) === true;
        $slackToken = env('SLACK_TOKEN');
        $slackChannel = env('SLACK_CHANNEL');
        if ($slackEnable && $slackToken && $slackChannel) {
            $monolog = \Log::getMonolog();
            $slackHandler = new SlackHandler(
                $slackToken,
                $slackChannel,
                'Monolog',
                true,
                null,
                Logger::WARNING
            );
            $monolog->pushHandler($slackHandler);
        }

        // Bootstrap Form
        Form::component('bsText', 'components.form.text', [
            'label',
            'name',
            'value'      => null,
            'attributes' => [],
            'hint'       => null,
        ]);
        Form::component('bsPassword', 'components.form.password', [
            'label',
            'name',
            'attributes' => [],
            'hint'       => null,
        ]);
        Form::component('bsEmail', 'components.form.email', [
            'label',
            'name',
            'value'      => null,
            'attributes' => [],
            'hint'       => null,
        ]);
        Form::component('bsUrl', 'components.form.url', [
            'label',
            'name',
            'value'      => null,
            'attributes' => [],
        ]);
        Form::component('bsTextarea', 'components.form.textarea', [
            'label',
            'name',
            'value'      => null,
            'attributes' => [],
        ]);
        Form::component('bsSelect', 'components.form.select', [
            'label',
            'name',
            'list'             => [],
            'selected'         => null,
            'selectAttributes' => [],
            'optionAttributes' => [],
        ]);
        Form::component('bsNumber', 'components.form.number', [
            'label',
            'name',
            'value'      => null,
            'attributes' => [],
        ]);
        Form::component('bsFile', 'components.form.file', [
            'label',
            'name',
            'attributes' => [],
        ]);
        Form::component('bsStatic', 'components.form.static', [
            'label',
            'value',
        ]);
        Form::component('bsCheckbox', 'components.form.checkbox', [
            'label',
            'name',
            'value'      => 1,
            'checked'    => null,
            'attributes' => [],
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
