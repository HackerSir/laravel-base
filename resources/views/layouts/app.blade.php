<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    {{-- Metatag --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')::{{ config('app.name') }}</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CSS --}}
    {{-- npm的bootstrap還未推出v4 --}}
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi"
          crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/bootstrap.min.css"/>
    {{-- DataTables --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
    <style>
        body > .container {
            padding-top: 60px;
            min-height: calc(100vh - 55px);
        }

        .table td, .table th {
            vertical-align: middle;
        }
    </style>
    @yield('css')
</head>
<body>
{{-- Navbar --}}
@include('components.navbar')

{{-- Content --}}
<div class="container">
    @yield('content')
</div>

{{-- Footer --}}
@include('components.footer')

{{-- Javascript --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"
        integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"
        integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"
        integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK"
        crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>
<script src="https://use.fontawesome.com/544fc47aab.js"></script>
{{-- DataTables --}}
<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.13/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.3/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script>
    //CSRF Token
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(function () {
        //AlertifyJS
        alertify.defaults = {
            notifier: {
                position: 'top-right'
            }
        };
        @if(session('global'))
            alertify.notify('{{ session('global') }}', 'success', 5);
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
        // Google分析
        @if(env('GOOGLE_ANALYSIS'))
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', '{{ env('GOOGLE_ANALYSIS') }}', 'auto');
        ga('send', 'pageview');
        @endif
    });
    // DataTables 預設設定
    (function ($, DataTable) {
        $.extend(true, DataTable.defaults, {
            responsive: true,
            language: {
                "processing": "處理中...",
                "loadingRecords": "載入中...",
                "lengthMenu": "顯示 _MENU_ 項結果",
                "zeroRecords": "沒有符合的結果",
                "info": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
                "infoEmpty": "顯示第 0 至 0 項結果，共 0 項",
                "infoFiltered": "(從 _MAX_ 項結果中過濾)",
                "infoPostFix": "",
                "search": "搜尋:",
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

    })(jQuery, jQuery.fn.dataTable);
</script>
@yield('js')

</body>
</html>
