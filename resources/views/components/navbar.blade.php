{{-- TODO: 由LaravelMenu或自動生成 --}}
<nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        {{-- 左側選單 --}}
        <ul class="nav navbar-nav">
            <li class="nav-item active"><a class="nav-link" href="javascript:void(0)">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">About</a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Contact</a></li>
        </ul>
        {{-- 右側選單 --}}
        <ul class="nav navbar-nav float-xs-right">
            @if (auth()->guest())
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
            @else
                {{-- TODO: 會員選單 --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="UserDropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="UserDropdown">
                        <a class="dropdown-item" href="javascript:void(0)">Profile</a>

                        <a class="dropdown-item" href="javascript:void(0)"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
