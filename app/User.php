<?php

namespace App;

use App\Traits\LegacySerializeDate;
use App\Traits\LogModelEvent;
use App\Traits\UuidPrimaryKey;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

/**
 * App\User
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $register_at 註冊時間
 * @property string|null $register_ip 註冊IP
 * @property \Illuminate\Support\Carbon|null $last_login_at 最後登入時間
 * @property string|null $last_login_ip 最後登入IP
 * @property \Illuminate\Support\Carbon|null $password_expired_at 密碼失效時間
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read bool $is_password_expired
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User orWherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|User orWhereRoleIs($role = '', $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRegisterAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRegisterIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use UuidPrimaryKey;
    use Notifiable;
    use LogModelEvent;
    use LegacySerializeDate;
    use \Illuminate\Auth\MustVerifyEmail {
        sendEmailVerificationNotification as originalSendEmailVerificationNotification;
        hasVerifiedEmail as originalHasVerifiedEmail;
    }

    protected static $ignoreChangedAttributes = [
        'updated_at',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_expired_at',
        'register_at',
        'register_ip',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'register_at', 'last_login_at', 'password_expired_at',
    ];

    /**
     * @return bool
     */
    public function getIsPasswordExpiredAttribute(): bool
    {
        if (!$this->password_expired_at) {
            return false;
        }

        return $this->password_expired_at->lt(now());
    }

    public function sendEmailVerificationNotification()
    {
        // 對原 sendEmailVerificationNotification() 追加檢查信箱驗證機制是否開啟
        if (!config('app-extend.email-validation')) {
            return;
        }
        $this->originalSendEmailVerificationNotification();
    }

    public function hasVerifiedEmail()
    {
        // 對原 hasVerifiedEmail() 追加檢查信箱驗證機制是否開啟
        if (!config('app-extend.email-validation')) {
            return true;
        }

        return $this->originalHasVerifiedEmail();
    }
}
