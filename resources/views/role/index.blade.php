@extends('app')

@section('title', '角色管理')

@section('content')
    <h2 class="ui teal header center aligned">
        角色管理
    </h2>
    <h3 class="ui header center aligned">角色清單</h3>
    <a href="{{ route('role.create') }}" class="ui icon brown inverted button">
        <i class="plus icon" aria-hidden="true"></i> 新增角色
    </a>
    <table class="ui selectable celled padded unstackable table">
        <thead>
        <tr style="text-align: center">
            <th class="single line">角色</th>
            <th class="single line">保護</th>
            <th class="single line">標籤</th>
            <th class="single line">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>
                    {{ $role->display_name }}（{{ $role->name }}）<br/>
                    <small><i class="angle double right icon"></i> {{ $role->description }}</small>
                </td>
                <td class="one wide" style="text-align: center">
                    @if($role->protection)
                        <i class="big lock icon"></i>
                    @endif
                </td>
                <td class="one wide">
                    {!! $role->tag !!}
                </td>
                <td class="four wide">
                    <a href="{{ route('role.edit', $role) }}" class="ui icon brown inverted button">
                        <i class="edit icon"></i> 編輯角色
                    </a>
                    @unless($role->protection)
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['role.destroy', $role],
                            'style' => 'display: inline',
                            'onSubmit' => "return confirm('確定要刪除此角色嗎？');"
                        ]) !!}
                        <button type="submit" class="ui icon red inverted button">
                            <i class="trash icon"></i> 刪除角色
                        </button>
                        {!! Form::close() !!}
                    @endunless
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h3 class="ui header center aligned">權限清單</h3>
    <table class="ui selectable celled padded unstackable table">
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
                    <small><i class="angle double right icon"></i> {{ $permission->description }}</small>
                </td>
                @foreach($roles as $role)
                    <td class="text-center" style="text-align: center">
                        @if($permission->hasRole($role->name))
                            <i class="checkmark icon green large"></i>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
