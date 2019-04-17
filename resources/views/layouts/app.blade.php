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
    {{--<script src="{{ asset(mix('/build-js/app.js')) }}" defer></script>--}}

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- DataTables --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    {{--<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">--}}
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">

    {{-- Styles --}}
    {{--<link rel="stylesheet" href="{{ asset(mix('/build-css/app.css')) }}">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    {{-- toastr.js --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .table td, .table th {
            vertical-align: middle;
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
    <main style="flex-grow:1; display: block!important;" class="d-flex mt-3 mb-3 container" id="app">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
{{-- DataTables --}}
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
{{--<script src="//cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>--}}
<script src="//cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
{{--<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>--}}
{{-- toastr.js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "3000",
        "hideDuration": "1000",
        "timeOut": "0",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    @if(session('success'))
        toastr["success"]('{{ session('success') }}');
    @endif
        @if(session('info'))
        toastr["info"]('{{ session('info') }}');
    @endif
        @if(session('warning'))
        toastr["warning"]('{{ session('warning') }}');
    @endif
        @if(session('error'))
        toastr["error"]('{{ session('error') }}');
    @endif
    // DataTables 預設設定
    (function ($, DataTable) {
        $.extend(true, DataTable.defaults, {
            pageLength: 10,
            autoWidth: false,
            responsive: true,
            stateSave: true,
            language: {
                "decimal": "",
                "emptyTable": "沒有資料",
                "thousands": ",",
                "processing": "處理中...",
                "loadingRecords": "載入中...",
                "lengthMenu": "顯示 _MENU_ 項結果",
                "zeroRecords": "沒有符合的結果",
                "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
                "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                "infoPostFix": "",
                "search": "搜尋：",
                "paginate": {
                    "first": "第一頁",
                    "previous": "上一頁",
                    "next": "下一頁",
                    "last": "最後一頁"
                },
                "aria": {
                    "sortAscending": ": 升冪排列",
                    "sortDescending": ": 降冪排列"
                }
            }
        });
        DataTable.ext.errMode = 'throw';
    })(jQuery, jQuery.fn.dataTable);
</script>
@yield('js')
</body>
</html>
