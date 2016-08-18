@extends('app')

@php($isEditMode = isset($role))
@php($methodText = $isEditMode ? '編輯' : '新增')

@section('title', $methodText . '角色')

@section('content')
    <h2 class="ui teal header center aligned">
        {{ $methodText }}角色
    </h2>
    @if($isEditMode)
        {!! SemanticForm::open()->action(route('role.update', $role))->patch() !!}
        {!! SemanticForm::bind($role) !!}
    @else
        {!! SemanticForm::open()->action(route('role.store')) !!}
    @endif
    <div class="ui stacked segment">
        @if($isEditMode && $role->protection)
            {!! SemanticForm::text('name')->label('角色英文名稱')->placeholder('如：admin')->required()->disable() !!}
            {!! SemanticForm::hidden('name', $role->name) !!}
        @else
            {!! SemanticForm::text('name')->label('角色英文名稱')->placeholder('如：admin')->required() !!}
        @endif
        {!! SemanticForm::text('display_name')->label('角色顯示名稱')->placeholder('如：管理員')->required() !!}
        {!! SemanticForm::text('description')->label('角色簡介')->placeholder('說明此角色之用途') !!}
        @include('form.field.color', ['errors' => $errors, 'label' => '標籤顏色', 'model' => isset($role) ? $role : null])
        <div class="field{{ ($errors->has('role'))?' error':'' }}">
            <label>權限</label>
            @foreach($permissions as $permission)
                <div class="ui checkbox">
                    @if($isEditMode && $role->protection)
                        {{ Form::checkbox('permissions[]', $permission->id, isset($role) && $role->perms->contains($permission), ['id' => 'checkbox_' . $permission->id, 'disabled']) }}
                    @else
                        {{ Form::checkbox('permissions[]', $permission->id, isset($role) && $role->perms->contains($permission), ['id' => 'checkbox_' . $permission->id]) }}
                    @endif
                    <label for="checkbox_{{ $permission->id }}">
                        {{ $permission->display_name }}（{{ $permission->name }}）<br/>
                        <small><i class="angle double right icon"></i> {{ $permission->description }}</small>
                    </label>
                </div>
                <br/>
                <br/>
            @endforeach
        </div>
        <div style="text-align: center">
            <a href="{{ route('role.index') }}" class="ui blue inverted icon button">
                <i class="icon arrow left"></i> 返回列表
            </a>
            {!! SemanticForm::submit('<i class="checkmark icon"></i> 確認')->addClass('ui icon submit red inverted button') !!}
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
