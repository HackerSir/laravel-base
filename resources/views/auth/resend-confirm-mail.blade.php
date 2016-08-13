@extends('app')

@section('title', '重新發送驗證信件')

@section('content')
    <div class="ui top attached segment">
        <div class="ui top attached label">重新發送驗證信件</div>
        <div class="ui large aligned center aligned relaxed stackable grid">
            <div class="ten wide column">
                <h2 class="ui teal image header">
                    Resend confirm mail
                </h2>
                {!! SemanticForm::open()->action(route('auth.resend-confirm-mail'))->addClass('large') !!}
                <div class="ui stacked segment">
                    {!! SemanticForm::email('email', $user->email)->label('Email')->placeholder('E-mail address')->required()->readonly() !!}
                    {!! SemanticForm::submit('Send reset link')->addClass('fluid large teal submit') !!}
                </div>
                <div class="ui message">
                    <div class="header">
                        請注意
                    </div>
                    <ul class="list">
                        <li>若信箱錯誤，請重新註冊帳號</li>
                        <li>發送前，請先確認信箱是否屬於自己</li>
                        <li>發送信件可能耗費幾分鐘，請耐心等待</li>
                        <li>僅最後一次發送之信件有效</li>
                    </ul>
                </div>
                {!! SemanticForm::close() !!}
            </div>
        </div>
    </div>
@endsection
