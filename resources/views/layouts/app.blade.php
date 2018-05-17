<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- Alertify js --}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.9.0/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.9.0/css/themes/bootstrap.min.css"/>
    <style>
        {{-- 讓 AlertifyJS 的 notify 往下一點，才不會擋到 navbar --}}
        .alertify-notifier.ajs-top {
            top: 60px;
        }

        .footer {
            padding-top: 15px;
            padding-bottom: 15px;
        }
    </style>

    @yield('css')

    @if (config('app.env') == 'production' && !empty(config('services.google_analytics.id')))
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
        <script async
                src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments)
            };
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
{{-- Navbar --}}
@include('components.navbar')

<div style="min-height: calc(100vh - 54px - 56px - 2rem);" class="mt-3 mb-3 container" id="app">
    @yield('content')
</div>

{{-- Footer --}}
@include('components.footer')

{{-- JavaScript --}}
{{-- jQuery first, then Popper.js, then Bootstrap JS --}}
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

{{-- Font Awesome --}}
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js"
        integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
        crossorigin="anonymous"></script>

{{-- Alertify js --}}
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
<script>
    $(function () {
        //AlertifyJS
        alertify.defaults = {
            autoReset: true,
            basic: false,
            closable: true,
            closableByDimmer: true,
            frameless: false,
            maintainFocus: true, // <== global default not per instance, applies to all dialogs
            maximizable: true,
            modal: true,
            movable: true,
            moveBounded: false,
            overflow: true,
            padding: true,
            pinnable: true,
            pinned: true,
            preventBodyShift: false, // <== global default not per instance, applies to all dialogs
            resizable: true,
            startMaximized: false,
            transition: 'pulse',
            notifier: {
                position: 'top-right'
            },
            // language resources
            glossary: {
                // dialogs default title
                title: 'AlertifyJS',
                // ok button text
                ok: 'OK',
                // cancel button text
                cancel: 'Cancel'
            },
            // theme settings
            theme: {
                // class name attached to prompt dialog input textbox.
                input: 'ajs-input',
                // class name attached to ok button
                ok: 'ajs-ok',
                // class name attached to cancel button
                cancel: 'ajs-cancel'
            }
        };
        @if(session('success'))
        alertify.notify('{{ session('success') }}', 'success', 5);
        @endif
        @if(session('warning'))
        alertify.notify('{{ session('warning') }}', 'warning', 5);
        @endif
        // Tooltip
        $('[title]:not(#tracy-debug *[title])').each(function () {
            $(this).tooltip({
                placement: 'right'
            });
        });
    });
    // DataTables 預設設定
    (function ($, DataTable) {
        $.extend(true, DataTable.defaults, {
            pageLength: 10,
            autoWidth: false,
            responsive: true,
            dom: "<'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-md-12'rt>><'row'<'col-md-6'i><'col-md-6'p>>",
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
