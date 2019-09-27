@extends('layouts.base')

@section('title', '會員管理')

@section('buttons')
    <a href="{{ route('user.create') }}" class="btn btn-primary">
        <i class="fa fa-plus-circle mr-2"></i>新增會員
    </a>
@endsection

@section('buttons-right')
    {{ bs()->openForm('get', url()->current(), ['model' => request()->all(), 'attributes' => ['id' => 'search-form', 'class' => 'form-inline']]) }}
    <div class="input-group">
        {{ bs()->inputGroup()->class('mb-2 mr-sm-2')->prefix('角色')->control(bs()->select('role', $roleNameOptions)) }}
    </div>
    <div class="btn-group" role="group">
        {{ bs()->submit('<i class="fas fa-filter"></i>')->class('mb-2')->attribute('title', '過濾') }}
        <a href="{{ url()->current() }}" class="btn btn-secondary mb-2 mr-sm-2" title="重設">
            <i class="fas fa-trash-alt"></i>
        </a>
    </div>
    {{ bs()->closeForm() }}
@endsection

@section('main_content')
    <div class="card">
        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection

@section('js')
    {!! $dataTable->scripts() !!}
@endsection
