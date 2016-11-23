@extends('layouts.app')

@section('title', '會員清單')

@section('content')
    <h1>會員清單</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>使用者</th>
                <th>信箱</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        {{ Html::image(Gravatar::src($user->email, 80), null, ['class'=>'img-thumbnail']) }}
                        <span style="font-size: 2em">
                        {{ link_to_route('user.show', $user->name, $user) }}
                            @foreach($user->roles as $role)
                                <span class="tag tag-default">{{ $role->display_name }}</span>
                            @endforeach
                        </span>
                    </td>
                    <td>
                        {{ $user->email }}
                        @if (!$user->isConfirmed)
                            <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true" title="尚未完成信箱驗證"></i>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user.show', $user) }}" class="btn btn-primary" title="會員資料">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-primary" title="編輯會員">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        {!! Form::open(['route' => ['user.destroy', $user], 'style' => 'display: inline', 'method' => 'DELETE', 'onSubmit' => "return confirm('確定要刪除此會員嗎？');"]) !!}
                        <button type="submit" class="btn btn-danger" title="刪除會員">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('components.pagination-bar', ['models' => $users])
@endsection
