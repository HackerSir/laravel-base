@extends('layouts.base')

@section('title', '重新發送驗證信件')

@section('main_content')
    <div class="card">
        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    驗證信件已重新發送。
                </div>
            @endif
            {{ bs()->openForm('post', route('verification.resend')) }}
            {{ bs()->formGroup(bs()->email('email')->value(auth()->user()->email)->readOnly())->label('信箱')
             ->helpText('信箱作為帳號使用，故無法修改')->showAsRow() }}
            <div class="alert alert-warning col-md-10 ml-auto" role="alert">
                請注意：
                <ul>
                    <li>若信箱錯誤，請重新註冊帳號</li>
                    <li>發送前，請先確認信箱是否屬於自己</li>
                    <li>發送信件可能耗費幾分鐘，請耐心等待</li>
                    <li>僅最後一次發送之信件有效</li>
                </ul>
            </div>
            <div class="row">
                <div class="mx-auto">
                    {{ bs()->submit('發送驗證信件', 'primary')->prependChildren(fa()->icon('envelope')->addClass('mr-2')) }}
                </div>
            </div>
            {{ bs()->closeForm() }}
        </div>
    </div>
@endsection
