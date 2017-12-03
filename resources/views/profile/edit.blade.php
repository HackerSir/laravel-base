@extends('layouts.base')

@section('title', '編輯個人資料')

@section('buttons')
    <a href="{{ route('profile') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> 個人資料
    </a>
@endsection

@section('main_content')
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'profile.update', 'method' => 'put']) }}
            {{ Form::model($user) }}
            {{ Form::bsEmail('信箱', 'email', null, ['readonly'], '信箱作為帳號使用，故無法修改') }}
            {{ Form::bsText('名稱', 'name', null, ['required']) }}

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
