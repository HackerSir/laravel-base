<!DOCTYPE html>
<html>
<head>
    <title>{{ $code }} - {{ $message }}</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }

        .subtitle {
            font-size: 48px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">{{ $code }}</div>
        <div class="subtitle">{{ $message }}</div>
        <a href="{{ url('/') }}">返回首頁</a><br/>
        <a href="javascript:history.back()">返回上一頁</a>
    </div>
</div>
</body>
</html>
