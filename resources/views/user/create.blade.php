@extends('layouts.base')

@section('title', '新增會員')

@section('buttons')
    <a href="{{ route('user.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left mr-2"></i>會員管理
    </a>
@endsection

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ bs()->openForm('post', route('user.store')) }}
            @include('user.form')

            <div class="row">
                <div class="mx-auto">
                    {{ bs()->submit('確認', 'primary')->prependChildren(fa()->icon('check')->addClass('mr-2')) }}
                </div>
            </div>
            {{ bs()->closeForm() }}
        </div>
    </div>
@endsection
