@extends('layouts.base')

@section('title', '登入')

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'login']) }}
            {{ Form::bsEmail('信箱', 'email', null, ['required']) }}
            {{ Form::bsPassword('密碼', 'password', ['required']) }}
            {{ Form::bsCheckbox('記住我', 'remember') }}

            <div class="form-group row">
                <div class="col-md-10 ml-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check" aria-hidden="true"></i> 登入
                    </button>

                    <a class="btn btn-link" href="{{ route('register') }}">
                        註冊
                    </a>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        忘記密碼
                    </a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
