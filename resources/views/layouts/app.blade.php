<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $title = '';
        if(View::hasSection('title')) {
            $title = View::yieldContent('title') . ' - ';
        }
        $title .= config('app-extend.title');
    @endphp

    @if(View::hasSection('description'))
        <meta name="description" content="{{trim(View::yieldContent('description'))}}">
    @endif

    <meta property="og:title" content="{{ $title }}">
    @if(View::hasSection('description'))
        <meta property="og:description" content="{{trim(View::yieldContent('description'))}}"/>
    @endif
    @if(View::hasSection('og:image'))
        <meta property="og:image" content="{{trim(View::yieldContent('og:image'))}}"/>
    @endif
    <meta property="og:url" content="{{ Request::url() }}"/>

    <title>{{ $title }}</title>

    {{-- Scripts --}}
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

{{-- Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- Styles --}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
        .footer {
            padding-top: 15px;
            padding-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="d-flex flex-column" id="app" style="min-height:100vh;">
    {{-- Navbar --}}
    @include('components.navbar')
    {{-- Main Content --}}
    <main style="flex-grow:1; display: block!important;" class="d-flex mt-3 mb-3 container" id="app">
        @yield('content')
    </main>
    {{-- Footer --}}
    @include('components.footer')
</div>

{{-- JavaScript --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
