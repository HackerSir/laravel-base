@extends('layouts.base')

@section('title', '登入')

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ bs()->openForm('post', route('login')) }}
            {{ bs()->formGroup(bs()->text('email')->required())->label('信箱')->showAsRow() }}
            {{ bs()->formGroup(bs()->password('password')->required())->label('密碼')->showAsRow() }}
            {{ bs()->formGroup(bs()->checkBox('remember', '記住我'))->showAsRow('no_label') }}
            <div class="row">
                <div class="mx-auto">
                    {{ bs()->submit('登入', 'primary')->prependChildren(fa()->icon('check')->addClass('mr-2')) }}
                    {{ bs()->a(route('register'), '註冊')->asButton('link') }}
                    {{ bs()->a(route('password.request'), '忘記密碼')->asButton('link') }}
                </div>
            </div>
            {{ bs()->closeForm() }}
        </div>
    </div>
@endsection
