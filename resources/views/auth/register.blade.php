@extends('layouts.base')

@section('title', '註冊')

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'register']) }}
            {{ Form::bsText('名稱', 'name', null, ['required']) }}
            {{ Form::bsEmail('信箱', 'email', null, ['required']) }}
            {{ Form::bsPassword('密碼', 'password', ['required']) }}
            {{ Form::bsPassword('確認密碼', 'password_confirmation', ['required']) }}

            <div class="form-group row">
                <div class="col-md-10 ml-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check" aria-hidden="true"></i> 註冊
                    </button>
                    <a class="btn btn-link" href="{{ route('login') }}">
                        登入
                    </a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
