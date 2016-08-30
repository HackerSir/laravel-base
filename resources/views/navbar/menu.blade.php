{{-- 由LaravelMenu或自動生成 --}}
<div class="ui large center aligned secondary pointing menu transition fixed"
     style="z-index: 3; background-color: white" id="navbar">
    <div class="ui container">
        <a class="toc item inverted">
            <i class="sidebar icon"></i>
        </a>
        @include('navbar.item', ['items' => Menu::get('left')->roots()])
        <div class="right menu">
            @include('navbar.item', ['items' => Menu::get('right')->roots()])
        </div>
    </div>
</div>
<div class="ui sidebar inverted vertical labeled icon menu" style="z-index: 999;">
    @include('navbar.sidebar-item', ['items' => Menu::get('sidebar')->roots()])
</div>
