@extends('app')

@section('title', '重設密碼')

@section('content')
    <div class="ui top attached segment">
        <div class="ui top attached label">重設密碼</div>
        <div class="ui large aligned center aligned relaxed stackable grid">
            <div class="ten wide column">
                <h2 class="ui teal image header">
                    Reset Password
                </h2>
                {!! SemanticForm::open()->action(action('Auth\PasswordController@reset'))->addClass('large') !!}
                <div class="ui stacked segment">
                    {!! SemanticForm::email('email', Request::get('email'))->label('Email')->placeholder('E-mail address')->required()->readonly() !!}
                    {!! SemanticForm::password('password')->label('Password')->placeholder('Password')->required() !!}
                    {!! SemanticForm::password('password_confirmation')->label('Password Confirmation')->placeholder('Password Confirmation')->required() !!}
                    {!! SemanticForm::hidden('token', $token) !!}
                    {!! SemanticForm::submit('Change password')->addClass('fluid large teal submit') !!}
                </div>

                @if($errors->count())
                    <div class="ui error message" style="display: block">
                        <ul class="list">
                            @foreach($errors->all('<li>:message</li>') as $error)
                                {!! $error !!}
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! SemanticForm::close() !!}
            </div>
        </div>
    </div>
@endsection
