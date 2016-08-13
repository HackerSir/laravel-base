@extends('app')

@section('title', "{$user->name} - 編輯會員資料")

@section('content')
    <h2 class="ui teal header center aligned">
        {{ $user->name }} - 編輯會員資料
    </h2>
    {!! SemanticForm::open()->patch()->action(route('user.update', $user))->addClass('large') !!}
    {!! SemanticForm::bind($user) !!}
    <div class="ui stacked segment">
        {!! SemanticForm::text('email')->label('Email')->placeholder('Email')->disable() !!}
        <div class="ui tiny negative message">
            <ul class="list">
                <li>信箱作為帳號使用，故無法修改</li>
            </ul>
        </div>
        {!! SemanticForm::text('name')->label('Name')->placeholder('Name / Nickname')->required() !!}
        <div class="field{{ ($errors->has('role'))?' error':'' }}">
            <label>角色</label>
            @foreach($roles as $role)
                <div class="ui checkbox">
                    @if($user->id == Auth::user()->id && $role->name == 'Admin')
                        {!! Form::checkbox('role[]', $role->id, $user->hasRole($role->name), ['disabled']) !!}
                        <label>
                            {{ $role->display_name }}
                            <i class="warning sign icon red" title="禁止解除自己的管理員職務"></i>
                        </label>
                    @else
                        {!! Form::checkbox('role[]', $role->id, $user->hasRole($role->name)) !!}
                        <label>{{ $role->display_name }} </label>
                    @endif
                </div>
                <br/>
            @endforeach
        </div>
        <div style="text-align: center">
            <a href="{{ route('user.show', $user) }}" class="ui icon blue inverted button"><i
                    class="icon arrow left"></i> 返回會員資料</a>
            {!! SemanticForm::submit('<i class="checkmark icon"></i> 更新會員資料')->addClass('ui icon submit red inverted button') !!}
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
