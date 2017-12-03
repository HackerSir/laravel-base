@extends('layouts.base')

@php
    $isEditMode = isset($role);
    $methodText = $isEditMode ? '編輯' : '新增';
@endphp

@section('title', $methodText . '角色')

@section('buttons')
    <a href="{{ route('role.index') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> 角色管理
    </a>
@endsection

@section('main_content')
    <div class="card">
        <div class="card-body">
            @if($isEditMode)
                {{ Form::open(['route' => ['role.update', $role], 'method' => 'patch']) }}
                {{ Form::model($role) }}
            @else
                {{ Form::open(['route' => 'role.store']) }}
            @endif
            @if($isEditMode && $role->protection)
                {{ Form::bsText('英文名稱', 'name', null, ['readonly', 'placeholder' => '如：admin']) }}
            @else
                {{ Form::bsText('英文名稱', 'name', null, ['required', 'placeholder' => '如：admin']) }}
            @endif
            {{ Form::bsText('顯示名稱', 'display_name', null, ['required', 'placeholder' => '如：管理員']) }}
            {{ Form::bsText('簡介', 'description', null, ['placeholder' => '說明此角色之用途']) }}

            <div class="form-group row">
                <label class="col-md-2 col-form-label">權限</label>
                <div class="col-md-10" style="padding-top: calc(.5rem - 1px * 2);">
                    @foreach($permissions as $permission)
                        @if(isset($role) && $role->protection)
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                       class="custom-control-input"
                                       @if(isset($role) && $role->permissions->contains($permission)) checked
                                       @endif
                                       disabled>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">
                                    {{ $permission->display_name }}（{{ $permission->name }}）<br/>
                                    <small>
                                        <i class="fa fa-angle-double-right"
                                           aria-hidden="true"></i> {{ $permission->description}}
                                    </small>
                                </span>
                            </label>
                        @else
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                       class="custom-control-input"
                                       @if(isset($role) && $role->permissions->contains($permission)) checked @endif>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">
                                    {{ $permission->display_name }}（{{ $permission->name }}）<br/>
                                    <small>
                                        <i class="fa fa-angle-double-right"
                                           aria-hidden="true"></i> {{ $permission->description }}
                                    </small>
                                </span>
                            </label>
                        @endif
                        <br/>
                    @endforeach
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-10 ml-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check" aria-hidden="true"></i> 確認
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
