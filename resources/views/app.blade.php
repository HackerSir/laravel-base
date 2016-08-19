<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    {{-- Metatag --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>@yield('title')::{{ config('site.name') }}</title>

    {{-- CSS --}}
    {!! Html::style('semantic/semantic.min.css') !!}
    {!! Html::style('//cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css') !!}
    {!! Html::style('//cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/semantic.min.css') !!}
    <style>
        body {
            padding-top: 70px;
            height: auto;
        }

        .secondary.pointing.menu {
            border: none !important;
        }

        .secondary.pointing.menu .toc.item {
            display: none;
        }

        @media only screen and (max-width: 700px) {
            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }

            .secondary.pointing.menu .toc.item {
                display: block;
            }
        }
    </style>
    @yield('css')
</head>
<body>
{{-- Navbar --}}
@include('navbar.menu')

{{-- Content --}}
<div class="ui container">
    @yield('content')
</div>
{{-- Footer --}}
@yield('footer')

{{-- Javascript --}}
{!! Html::script('//code.jquery.com/jquery-3.1.0.min.js') !!}
{!! Html::script('semantic/semantic.min.js') !!}
{!! Html::script('//cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js') !!}
<script>
    $(document).ready(function () {
//            $('.toc.item').click(function () {
//                $('i.sidebar.icon').transition('fade out');
//            });
//            $('.ui.sidebar').sidebar('attach events', '.toc.item').sidebar('setting', 'transition', 'overlay');
        $('.ui.dropdown').each(function () {
            $(this).dropdown({
                fullTextSearch: true
            });
        });

        //AlertifyJS
        alertify.defaults = {
            notifier: {
                position: 'top-right'
            }
        };
        @if(Session::has('global'))
            alertify.notify('{{ Session::get('global') }}', 'success', 5);
        @endif
        @if(Session::has('warning'))
            alertify.notify('{{ Session::get('warning') }}', 'warning', 5);
        @endif
        // popup
        $('[title]:not(#tracy-debug *[title])').each(function () {
            $(this).popup({
                variation: 'inverted',
                position: 'right center'
            });
        });
    });
</script>
@yield('js')

</body>
</html>
