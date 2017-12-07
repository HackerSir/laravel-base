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
                {{ bs()->openForm('patch', route('role.update', $role), ['model' => $role]) }}
            @else
                {{ bs()->openForm('post', route('role.store')) }}
            @endif
            @if($isEditMode && $role->protection)
                {{ bs()->formGroup(bs()->text('name')->readOnly()->placeholder('如：admin'))->label('英文名稱')->showAsRow() }}
            @else
                {{ bs()->formGroup(bs()->text('name')->required()->placeholder('如：admin'))->label('英文名稱')->showAsRow() }}
            @endif
            {{ bs()->formGroup(bs()->text('display_name')->required()->placeholder('如：管理員'))->label('顯示名稱')->showAsRow() }}
            {{ bs()->formGroup(bs()->text('description')->required()->placeholder('說明此角色之用途'))->label('簡介')->showAsRow() }}

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

            <div class="row">
                <div class="mx-auto">
                    {{ bs()->submit('確認', 'primary')->prependChildren(fa()->icon('check')->addClass('mr-2')) }}
                </div>
            </div>
            {{ bs()->closeForm() }}
        </div>
    </div>
@endsection
