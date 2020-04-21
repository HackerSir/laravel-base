{{ $user->email }}
@if (!$user->hasVerifiedEmail())
    <i class="fas fa-exclamation-triangle text-danger" title="尚未完成信箱驗證"></i>
@endif
