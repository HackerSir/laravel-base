@extends('layouts.base')

@section('title', '修改密碼')

@section('buttons')
    <a href="{{ route('profile') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> 個人資料
    </a>
@endsection

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'password.change', 'method' => 'put']) }}
            {{ Form::bsPassword('密碼', 'password', ['required']) }}
            {{ Form::bsPassword('新密碼', 'new_password', ['required']) }}
            {{ Form::bsPassword('確認新密碼', 'new_password_confirmation', ['required']) }}

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
