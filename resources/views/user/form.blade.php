@if(isset($user))
    {{ bs()->formGroup(bs()->email('email')->readOnly())->label('信箱')->helpText('信箱作為帳號使用，故無法修改')->showAsRow() }}
    {{ bs()->formGroup(bs()->password('new_password')->attribute('autocomplete', 'new-password'))->label('新密碼')->helpText('如不更換密碼，請留白')->showAsRow() }}
    {{ bs()->formGroup(bs()->password('new_password_confirmation')->attribute('autocomplete', 'new-password'))->label('確認密碼')->helpText('如不更換密碼，請留白')->showAsRow() }}
    {{ bs()->formGroup(bs()->checkBox('password_expired', '要求重設密碼', $user->is_password_expired))->label('要求重設密碼')->helpText('若勾選，該會員登入後，需重設密碼方能使用網站功能')->showAsRow() }}
@else
    {{ bs()->formGroup(bs()->email('email')->required())->label('信箱')->showAsRow() }}
    {{ bs()->formGroup(bs()->password('new_password')->attribute('autocomplete', 'new-password')->required())->label('密碼')->showAsRow() }}
    {{ bs()->formGroup(bs()->password('new_password_confirmation')->attribute('autocomplete', 'new-password')->required())->label('確認密碼')->showAsRow() }}
    {{ bs()->formGroup(bs()->checkBox('password_expired', '要求重設密碼', true))->label('要求重設密碼')->helpText('若勾選，該會員登入後，需重設密碼方能使用網站功能')->showAsRow() }}
@endif
{{ bs()->formGroup(bs()->text('name')->required())->label('名稱')->showAsRow() }}

<div class="form-group row">
    <label class="col-md-2 col-form-label">角色</label>
    <div class="col-md-10" style="padding-top: calc(.5rem - 1px * 2);">
        @foreach($roles as $role)
            @if(isset($user) && $user->id == Auth::user()->id && $role->name == 'Admin')
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="role[]" value="{{ $role->id }}"
                           class="custom-control-input" id="roleCheck{{ $role->id }}"
                           @if($user->hasRole($role->name)) checked disabled @endif>
                    <label class="custom-control-label" for="roleCheck{{ $role->id }}">
                        {{ $role->display_name }}（{{ $role->description }}）
                        <i class="fas fa-exclamation-triangle text-danger" title="禁止解除自己的管理員職務"></i>
                    </label>
                </div>
            @else
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="role[]" value="{{ $role->id }}"
                           class="custom-control-input" id="roleCheck{{ $role->id }}"
                           @if(isset($user) && $user->hasRole($role->name)) checked @endif>
                    <label class="custom-control-label" for="roleCheck{{ $role->id }}">
                        {{ $role->display_name }}（{{ $role->description }}）
                    </label>
                </div>
            @endif
            <br/>
        @endforeach
        @if ($errors->has('role'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
    </div>
</div>
