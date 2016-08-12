<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2 style="text-align: center">嘿 {{ $name }}，歡迎加入{{ Config::get('site.name') }}！</h2>
<p>
    有人向我們提出帳號申請，請透過以下連結，完成帳號驗證：<br/>
    <a href="{{ $link }}">{{ $link }}</a><br/>
    <span style="color:grey;font-size: 50%">（驗證連結僅最後一次生成的有效，若多次請求或收到驗證信件，請點擊最後一封信的連結）</span>
</p>
<p>
    如果上面的網址不是連結，請您將該網址複製到瀏覽器(IE、Firefox、Chrome等)的網址列。<br/>
    如果您沒有註冊帳號，請您忽略這封信，您不需要回覆這封信件或通知我們，這個帳號會在驗證時間過後被刪除！
</p>
<br/>
</body>
</html>
