<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2 style="text-align: center">重新設定你在 {{ Config::get('site.name') }} 的密碼！</h2>
<p>
    有人向我們提出密碼重設申請，請透過以下連結，完成密碼重設：<br/>
    <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a><br/>
</p>
<p>
    如果上面的網址不是連結，請您將該網址複製到瀏覽器(IE、Firefox、Chrome等)的網址列。<br/>
    如果您沒有註冊帳號，請您忽略這封信，您不需要回覆這封信件或通知我們！
</p>
<br/>
</body>
</html>
