@extends('layouts.base')

@section('title', '個人資料')

@section('css')
    <style>
        #gravatar:hover {
            border: 1px dotted black;
        }
    </style>
@endsection

@section('buttons')
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">
        <i class="fas fa-edit mr-2"></i>編輯資料
    </a>
    <a href="{{ route('password.change') }}" class="btn btn-primary">
        <i class="fas fa-key mr-2"></i>修改密碼
    </a>
@endsection

@section('main_content')
    <div class="card">
        <div class="card-body text-center">
            {{-- Gravatar大頭貼 --}}
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
                        <i class="fas fa-exclamation-triangle text-danger" title="尚未完成信箱驗證"></i>
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
