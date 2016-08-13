@extends('app')

@section('title', '修改密碼')

@section('content')
    <h2 class="ui teal header center aligned">修改密碼</h2>
    {!! SemanticForm::open()->put()->action(route('auth.update-password'))->addClass('large') !!}
    <div class="ui stacked segment">
        {!! SemanticForm::password('password')->label('Password')->placeholder('Password')->required() !!}
        {!! SemanticForm::password('new_password')->label('New password')->placeholder('New password')->required() !!}
        {!! SemanticForm::password('new_password_confirmation')->label('New password Confirmation')->placeholder('New password Confirmation')->required() !!}

        {{-- TODO: text-align: center要獨立成一個text-center --}}
        <div style="text-align: center">
            <a href="{{ route('profile') }}" class="ui icon blue inverted button"><i class="icon arrow left"></i> 返回個人資料</a>
            {!! SemanticForm::submit('<i class="checkmark icon"></i> 更新密碼')->addClass('ui icon submit red inverted button') !!}
        </div>
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
@endsection
