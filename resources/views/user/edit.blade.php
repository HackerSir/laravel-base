@extends('layouts.base')

@section('title', "{$user->name} - 編輯會員資料")

@section('buttons')
    <a href="{{ route('user.show', $user) }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> 會員資料
    </a>
@endsection

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => ['user.update', $user], 'method' => 'patch']) }}
            {{ Form::model($user) }}

            {{ Form::bsEmail('信箱', 'email', null, ['readonly'], '信箱作為帳號使用，故無法修改') }}
            {{ Form::bsText('名稱', 'name', null) }}

            <div class="form-group row">
                <label class="col-md-2 col-form-label">角色</label>
                <div class="col-md-10" style="padding-top: calc(.5rem - 1px * 2);">
                    @foreach($roles as $role)
                        @if($user->id == Auth::user()->id && $role->name == 'Admin')
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="role[]" value="{{ $role->id }}"
                                       class="custom-control-input" @if($user->hasRole($role->name))
                                       checked disabled @endif>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">
                                    {{ $role->display_name }}（{{ $role->description }}）
                                    <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"
                                       title="禁止解除自己的管理員職務"></i>
                                </span>
                            </label>
                        @else
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="role[]" value="{{ $role->id }}"
                                       class="custom-control-input"
                                       @if($user->hasRole($role->name)) checked @endif>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">
                                    {{ $role->display_name }}（{{ $role->description }}）
                                </span>
                            </label>
                        @endif
                        <br/>
                    @endforeach
                    @if ($errors->has('role'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-10 ml-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check" aria-hidden="true"></i> 更新會員資料
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
