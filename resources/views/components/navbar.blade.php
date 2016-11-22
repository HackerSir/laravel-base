{{-- TODO: 由LaravelMenu或自動生成 --}}
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
            @if (auth()->guest())
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else
                @if(!auth()->user()->isConfirmed)
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('confirm-mail.resend') }}">尚未完成信箱驗證</a>
                    </li>
                @endif
                {{-- 會員選單 --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="UserDropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="UserDropdown">
                        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>

                        <a class="dropdown-item" href="javascript:void(0)"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
