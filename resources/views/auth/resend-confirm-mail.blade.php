@extends('layouts.base')

@section('title', '重新發送驗證信件')

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'confirm-mail.resend']) }}
            {{ Form::bsEmail('信箱', 'email', $user->email, ['readonly'], '信箱作為帳號使用，故無法修改') }}

            <div class="alert alert-warning col-md-10 ml-auto" role="alert">
                請注意：
                <ul>
                    <li>若信箱錯誤，請重新註冊帳號</li>
                    <li>發送前，請先確認信箱是否屬於自己</li>
                    <li>發送信件可能耗費幾分鐘，請耐心等待</li>
                    <li>僅最後一次發送之信件有效</li>
                </ul>
            </div>

            <div class="form-group row">
                <div class="col-md-10 ml-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i> 發送驗證信件
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
