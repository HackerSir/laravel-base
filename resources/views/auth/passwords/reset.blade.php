@extends('layouts.base')

@section('title', '重設密碼')

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'password.request']) }}
            <input type="hidden" name="token" value="{{ $token }}">
            {{ Form::bsEmail('信箱', 'email', null, ['required']) }}
            {{ Form::bsPassword('密碼', 'password', ['required']) }}
            {{ Form::bsPassword('確認密碼', 'password_confirmation', ['required']) }}

            <div class="form-group row">
                <div class="col-md-10 ml-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check" aria-hidden="true"></i> 重設密碼
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
