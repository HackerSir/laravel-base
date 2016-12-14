<a href="{{ route('user.show', $id) }}" class="ui icon blue inverted button" title="會員資料">
    <i class="user icon"></i>
</a>
<a href="{{ route('user.edit', $id) }}" class="ui icon brown inverted button" title="編輯會員">
    <i class="edit icon"></i>
</a>
{!! Form::open(['route' => ['user.destroy', $id], 'style' => 'display: inline', 'method' => 'DELETE', 'onSubmit' => "return confirm('確定要刪除此會員嗎？');"]) !!}
<button type="submit" class="ui icon red inverted button" title="刪除會員">
    <i class="trash icon"></i>
</button>
{!! Form::close() !!}
