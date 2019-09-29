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

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- DataTables --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    {{--<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">--}}
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">

    {{-- Styles --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    {{-- toastr.js --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset(mix('/build-css/app.css')) }}">
    <style>
        .table td, .table th {
            vertical-align: middle;
        }

        .toast {
            max-width: inherit;
        }

        .toast-top-full-width {
            top: 60px;
        }

        .footer {
            padding-top: 15px;
            padding-bottom: 15px;
        }
    </style>
    @yield('css')

    @if (config('app.env') == 'production' && !empty(config('services.google_analytics.id')))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async
                src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
            gtag('config', '{{ config('services.google_analytics.id') }}');
        </script>
    @endif
    @if (config('app.env') == 'production' && !empty(config('services.google_ad.client')))
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "{{ config('services.google_ad.client') }}",
                enable_page_level_ads: true
            });
        </script>
    @endif
</head>
<body>
<div class="d-flex flex-column" id="app" style="min-height:100vh;">
    {{-- Navbar --}}
    @include('components.navbar')
    {{-- Main Content --}}
    <main style="flex-grow:1; display: block!important;" class="d-flex mt-3 mb-3 @yield('container_class', 'container')"
          id="app">
        @yield('content')
    </main>
    {{-- Footer --}}
    @include('components.footer')
    {{-- Logout form --}}
    @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</div>

{{-- JavaScript --}}
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
{{-- Scripts --}}
<script src="{{ asset(mix('/build-js/app.js')) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
{{-- DataTables --}}
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
{{--<script src="//cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>--}}
<script src="//cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
{{--<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>--}}
{{-- toastr.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- 各種 js 的設定 --}}
<script src="{{ asset(mix('build-js/options.js')) }}"></script>
{{-- 通知 --}}
@if(session('success'))
    <script>toastr["success"]('{{ session('success') }}');</script>
@endif
@if(session('info'))
    <script>toastr["info"]('{{ session('info') }}');</script>
@endif
@if(session('warning'))
    <script>toastr["warning"]('{{ session('warning') }}');</script>
@endif
@if(session('error'))
    <script>toastr["error"]('{{ session('error') }}');</script>
@endif

@yield('js')
</body>
</html>
