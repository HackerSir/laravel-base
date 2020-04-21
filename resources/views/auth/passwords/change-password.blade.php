@extends('layouts.base')

@section('title', '修改密碼')

@section('buttons')
    @if(!$user->is_password_expired)
        <a href="{{ route('profile') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>個人資料
        </a>
    @endif
@endsection

@section('main_content')
    @if($user->is_password_expired)
        <div class="alert alert-danger">
            請修改密碼以繼續使用網站功能
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {{ bs()->openForm('put', route('password.change')) }}
            {{ bs()->formGroup(bs()->password('password')->required())->label('密碼')->showAsRow() }}
            {{ bs()->formGroup(bs()->password('new_password')->required())->label('新密碼')->showAsRow() }}
            {{ bs()->formGroup(bs()->password('new_password_confirmation')->required())->label('確認新密碼')->showAsRow() }}
            <div class="row">
                <div class="mx-auto">
                    {{ bs()->submit('確認', 'primary')->prependChildren(fa()->icon('check')->addClass('mr-2')) }}
                </div>
            </div>
            {{ bs()->closeForm() }}
        </div>
    </div>
@endsection
