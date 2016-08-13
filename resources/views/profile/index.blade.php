@extends('app')

@section('title', '個人資料')

@section('css')
    <style>
        #gravatar {
            border: 3px solid white;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        #gravatar:hover {
            border: 3px dotted black;
        }

        /* TODO: 看要置左還是置中，然後看要不要抽出來做*/
        @media only screen and (max-width: 767px) {
            td {
                text-align: center !important;
            }
        }
    </style>
@endsection

@section('content')
    <h2 class="ui teal header center aligned">個人資料</h2>
    <div class="ui header center aligned">
        {{-- Gravatar大頭貼 --}}
        <a href="https://zh-tw.gravatar.com/" target="_blank" title="透過Gravatar更換照片"
           class="ui medium circular image">
            <img src="{{ Gravatar::src($user->email, 200) }}" class="ui image" id="gravatar"/></a><br/>
    </div>

    <table class="ui selectable stackable table" id="userInfo">
        <tr>
            <td class="four wide right aligned">名稱：</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td class="right aligned">Email：</td>
            <td>{{ $user->email }}</td>
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
        <a href="{{ route('profile.edit') }}" class="ui icon brown inverted button">
            <i class="icon edit"></i> 編輯資料</a>
        <a href="{{ route('auth.change-password') }}" class="ui icon brown inverted button">
            <i class="icon lock"></i> 修改密碼
        </a>
    </div>

@endsection
