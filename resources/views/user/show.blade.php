@extends('layouts.base')

@section('title', "{$user->name} - 會員資料")

@section('css')
    <style>
        #gravatar:hover {
            border: 1px dotted black;
        }
    </style>
@endsection

@section('buttons')
    <a href="{{ route('user.index') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left mr-2"></i>會員管理
    </a>
    <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">
        <i class="fa fa-edit mr-2"></i>編輯資料
    </a>
    {!! Form::open(['route' => ['user.destroy', $user], 'style' => 'display: inline', 'method' => 'DELETE', 'onSubmit' => "return confirm('確定要刪除此會員嗎？');"]) !!}
    <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash mr-2"></i>刪除會員
    </button>
    {!! Form::close() !!}
@endsection

@section('main_content')
    <div class="card">
        <div class="card-body text-center">
            {{-- Gravatar大頭貼--}}
            <a href="https://zh-tw.gravatar.com/" target="_blank" title="透過 Gravatar 更換照片">
                <img src="{{ Gravatar::get($user->email, 'large') }}" class="img-thumbnail" id="gravatar"
                     alt="gravatar"/>
            </a>
        </div>
        <div class="card-body">
            <dl class="row" style="font-size: 120%">
                <dt class="col-4 col-md-3">名稱</dt>
                <dd class="col-8 col-md-9">{{ $user->name }}</dd>

                <dt class="col-4 col-md-3">Email</dt>
                <dd class="col-8 col-md-9">
                    {{ $user->email }}
                    @if (!$user->hasVerifiedEmail())
                        <i class="fa fa-exclamation-triangle text-danger" title="尚未完成信箱驗證"></i>
                    @endif
                </dd>

                <dt class="col-4 col-md-3">角色</dt>
                <dd class="col-8 col-md-9">
                    @foreach($user->roles as $role)
                        {{ $role->display_name }}<br/>
                    @endforeach
                </dd>

                <dt class="col-4 col-md-3">註冊時間</dt>
                <dd class="col-8 col-md-9">{{ $user->register_at }}</dd>

                <dt class="col-4 col-md-3">註冊IP</dt>
                <dd class="col-8 col-md-9">{{ $user->register_ip }}</dd>

                <dt class="col-4 col-md-3">最後登入時間</dt>
                <dd class="col-8 col-md-9">{{ $user->last_login_at }}</dd>

                <dt class="col-4 col-md-3">最後登入IP</dt>
                <dd class="col-8 col-md-9">{{ $user->last_login_ip }}</dd>
            </dl>
        </div>
    </div>
@endsection
