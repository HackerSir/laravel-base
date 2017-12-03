@extends('layouts.base')

@section('title', '重設密碼')

@section('buttons')
    <a href="{{ route('login') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> 返回
    </a>
@endsection


@section('main_content')
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            {{ Form::open(['route' => 'password.email']) }}
            {{ Form::bsEmail('信箱', 'email', null, ['required']) }}

            <div class="form-group row">
                <div class="col-md-10 ml-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i> 發送重設密碼信件
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
