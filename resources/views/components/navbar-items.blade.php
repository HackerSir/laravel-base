@foreach($items as $item)
    <li@lm-attrs($item) class="nav-item @if($item->hasChildren()) dropdown @endif " @lm-endattrs>
    @if($item->link)
        <a@lm-attrs($item->link) class="nav-link @if($item->hasChildren()) dropdown-toggle @endif" @if($item->hasChildren()) data-toggle="dropdown" @endif @lm-endattrs href="{!! $item->url() !!}">
        {!! $item->title !!}
        @if($item->hasChildren()) <b class="caret"></b> @endif
        </a>
        @else
            {!! $item->title !!}
        @endif
        @if($item->hasChildren())
            <ul class="dropdown-menu">
                @include(config('laravel-menu.views.bootstrap-items'),
        array('items' => $item->children()))
            </ul>
            @endif
            </li>
            @if($item->divider)
                <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
            @endif
            @endforeach
