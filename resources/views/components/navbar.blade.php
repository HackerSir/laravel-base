{{-- 由LaravelMenu或自動生成 --}}
<nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        {{-- 左側選單 --}}
        <ul class="nav navbar-nav">
            @include(config('laravel-menu.views.bootstrap-items'), array('items' => Menu::get('left')->roots()))
        </ul>
        {{-- 右側選單 --}}
        <ul class="nav navbar-nav float-xs-right">
            @include(config('laravel-menu.views.bootstrap-items'), array('items' => Menu::get('right')->roots()))
        </ul>
    </div>
</nav>
