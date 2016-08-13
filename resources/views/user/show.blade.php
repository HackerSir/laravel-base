@extends('app')

@section('title', "{$user->name} - 會員資料")

@section('css')
    <style>
        /* TODO: 看要置左還是置中，然後看要不要抽出來做*/
        @media only screen and (max-width: 767px) {
            td {
                text-align: center !important;
            }
        }

        #gravatar {
            border: 3px solid white;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        #gravatar:hover {
            border: 3px dotted black;
        }
    </style>
@endsection

@section('content')
    <h2 class="ui teal header center aligned">
        {{ $user->name }} - 會員資料
    </h2>
    <div class="ui header center aligned">
        {{-- Gravatar大頭貼 --}}
        <a href="https://zh-tw.gravatar.com/" target="_blank" title="透過Gravatar更換照片"
           class="ui medium circular image">
            <img src="{{ Gravatar::src($user->email, 200) }}" class="ui image" id="gravatar"/></a><br/>
    </div>

    <table class="ui selectable stackable table">
        <tr>
            <td class="four wide right aligned">名稱：</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td class="right aligned">Email：</td>
            <td>
                {{ $user->email }}
                @if (!$user->isConfirmed)
                    <i class="warning sign icon red" title="尚未完成信箱驗證"></i>
                @endif
            </td>
        </tr>
        <tr>
            <td class="right aligned">角色：</td>
            <td>
                @foreach($user->roles as $role)
                    {!! $role->tag !!}
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="four wide right aligned">註冊時間：</td>
            <td>{{ $user->register_at }}</td>
        </tr>
        <tr>
            <td class="right aligned">註冊IP：</td>
            <td>{{ $user->register_ip }}</td>
        </tr>
        <tr>
            <td class="right aligned">最後登入時間：</td>
            <td>{{ $user->last_login_at }}</td>
        </tr>
        <tr>
            <td class="right aligned">最後登入IP：</td>
            <td>{{ $user->last_login_ip }}</td>
        </tr>
    </table>

    {{-- TODO: text-align: center要獨立成一個text-center --}}
    <div style="text-align: center">
        <a href="{{ route('user.index') }}" class="ui blue inverted icon button"><i class="arrow left icon"></i>
            會員清單</a>
        <a href="{{ route('user.edit', $user) }}" class="ui brown inverted icon button"><i class="edit icon"></i>
            編輯資料</a>
        {!! Form::open(['route' => ['user.destroy', $user], 'style' => 'display: inline', 'method' => 'DELETE', 'onSubmit' => "return confirm('確定要刪除此會員嗎？');"]) !!}
        <button type="submit" class="ui icon red inverted button">
            <i class="trash icon"></i> 刪除會員
        </button>
        {!! Form::close() !!}
    </div>

@endsection
