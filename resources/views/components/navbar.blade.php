{{-- 由LaravelMenu或自動生成 --}}
<nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="container collapse navbar-toggleable-xs" id="navbarResponsive">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        {{-- 左側選單 --}}
        <ul class="nav navbar-nav">
            @include(config('laravel-menu.views.bootstrap-items'), array('items' => Menu::get('left')->roots()))
        </ul>
        {{-- 右側選單 --}}
        <ul class="nav navbar-nav float-sm-right">
            @include(config('laravel-menu.views.bootstrap-items'), array('items' => Menu::get('right')->roots()))
        </ul>
    </div>
</nav>
