<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        {{-- Metatag --}}
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>@yield('title')::Base</title>

        {{-- CSS --}}
        {!! Html::style('semantic/semantic.min.css') !!}
        {!! Html::style('//cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/semantic.min.css') !!}
        @yield('css')
    </head>
    <body>
        {{-- Navbar --}}
        @yield('navbar')

        {{-- Content --}}
        <div class="ui container">
            @yield('content')
        </div>
        {{-- Footer --}}
        @yield('footer')

        {{-- Javascript --}}
        {!! Html::script('//code.jquery.com/jquery-3.1.0.min.js') !!}
        {!! Html::script('semantic/semantic.js') !!}
        {!! Html::script('//cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js') !!}
        @yield('js')

    </body>
</html>
