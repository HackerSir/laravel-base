@extends('app')

@section('title', '編輯個人資料')

@section('content')
    <h2 class="ui teal header center aligned">編輯個人資料</h2>
    {!! SemanticForm::open()->put()->action(route('profile.update'))->addClass('large') !!}
    {!! SemanticForm::bind($user) !!}
    <div class="ui stacked segment">
        {!! SemanticForm::text('email')->label('Email')->placeholder('Email')->disable() !!}
        <div class="ui tiny negative message">
            <ul class="list">
                <li>信箱作為帳號使用，故無法修改</li>
            </ul>
        </div>
        {!! SemanticForm::text('name')->label('Name')->placeholder('Name / Nickname')->required() !!}

        {{-- TODO: text-align: center要獨立成一個text-center --}}
        <div style="text-align: center">
            <a href="{{ route('profile') }}" class="ui icon blue inverted button"><i class="icon arrow left"></i> 返回個人資料</a>
            {!! SemanticForm::submit('<i class="checkmark icon"></i> 更新個人資料')->addClass('ui icon submit red inverted button') !!}
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
