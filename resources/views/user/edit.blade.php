@extends('layouts.base')

@section('title', "{$user->name} - 編輯會員資料")

@section('buttons')
    <a href="{{ route('user.show', $user) }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left mr-2"></i> 會員資料
    </a>
@endsection

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ bs()->openForm('patch', route('user.update', $user), ['model' => $user]) }}
            @include('user.form')

            <div class="row">
                <div class="mx-auto">
                    {{ bs()->submit('更新會員資料', 'primary')->prependChildren(fa()->icon('check')->addClass('mr-2')) }}
                </div>
            </div>
            {{ bs()->closeForm() }}
        </div>
    </div>
@endsection
