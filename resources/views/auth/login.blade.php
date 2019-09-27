@extends('layouts.base')

@section('title', '登入')

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ bs()->openForm('post', route('login')) }}
            {{ bs()->formGroup(bs()->text('email')->required())->label('信箱')->showAsRow() }}
            {{ bs()->formGroup(bs()->password('password')->required())->label('密碼')->showAsRow() }}
            {{ bs()->formGroup(bs()->checkBox('remember', '記住我'))->showAsRow('no_label') }}
            @include('components.recaptcha')
            <div class="row">
                <div class="mx-auto">
                    {{ bs()->submit('登入', 'primary')->prependChildren(fa()->icon('check')->addClass('mr-2')) }}
                    @if((bool)config('app-extend.allow-register'))
                        {{ bs()->a(route('register'), '註冊')->asButton('light')->prependChildren(fa()->icon('user-plus')->addClass('mr-2')) }}
                    @endif
                    {{ bs()->a(route('password.request'), '忘記密碼')->asButton('light')->prependChildren(fa()->icon('question-circle')->addClass('mr-2')) }}
                </div>
            </div>
            {{ bs()->closeForm() }}
        </div>
    </div>
@endsection
