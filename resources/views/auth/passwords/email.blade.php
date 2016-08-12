@extends('app')

@section('title', '重設密碼')

@section('content')
    <div class="ui container">
        <div class="ui top attached segment">
            <div class="ui top attached label">重設密碼</div>
            <div class="ui large aligned center aligned relaxed stackable grid">
                <div class="ten wide column">
                    <h2 class="ui teal image header">
                        Reset Password
                    </h2>
                    @if (session('status'))
                        <div class="ui positive message">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! SemanticForm::open()->action(action('Auth\PasswordController@sendResetLinkEmail'))->addClass('large') !!}
                    <div class="ui stacked segment">
                        {!! SemanticForm::email('email')->label('Email')->placeholder('E-mail address')->required() !!}
                        {!! SemanticForm::submit('Send reset link')->addClass('fluid large teal submit') !!}
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
    </div>
@endsection
