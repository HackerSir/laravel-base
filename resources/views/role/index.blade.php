@extends('layouts.base')

@section('title', '角色管理')

@section('main_content')
    <div class="card">
        <div class="card-body">
            <h2>角色清單</h2>
            <a href="{{ route('role.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle mr-2"></i>新增角色
            </a>
            <div class="table-responsive mt-1">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>角色</th>
                        <th>保護</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                {{ $role->display_name }}（{{ $role->name }}）<br/>
                                <small>
                                    <i class="fas fa-angle-double-right mr-2"></i>{{ $role->description }}
                                </small>
                            </td>
                            <td style="text-align: center">
                                @if($role->protection)
                                    <i class="fas fa-check fa-2x text-success"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('role.edit', $role) }}" class="btn btn-primary">
                                    <i class="fas fa-edit mr-2"></i>編輯角色
                                </a>
                                @unless($role->protection)
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['role.destroy', $role],
                                        'style' => 'display: inline',
                                        'onSubmit' => "return confirm('確定要刪除此角色嗎？');"
                                    ]) !!}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash mr-2"></i>刪除角色
                                    </button>
                                    {!! Form::close() !!}
                                @endunless
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <hr/>
            <h2>權限清單</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr style="text-align: center">
                        <th class="single line">權限節點</th>
                        @foreach($roles as $role)
                            <th class="single line">
                                {{ $role->display_name }}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->display_name }}（{{ $permission->name }}）<br/>
                                <small>
                                    <i class="fas fa-angle-double-right mr-2"></i>{{ $permission->description }}
                                </small>
                            </td>
                            @foreach($roles as $role)
                                <td class="text-center" style="text-align: center">
                                    @if($permission->hasRole($role->name))
                                        <i class="fas fa-check fa-2x text-success"></i>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
