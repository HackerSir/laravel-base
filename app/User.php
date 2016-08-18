<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * 使用者
 *
 * @property-read int id
 * @property string name
 * @property string email
 * @property string confirm_code
 * @property \Carbon\Carbon|null confirm_at
 * @property bool isConfirmed
 * @property \Carbon\Carbon|null register_at
 * @property string register_ip
 * @property \Carbon\Carbon|null last_login_at
 * @property string last_login_ip
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] roles
 *
 * @property \Carbon\Carbon|null created_at
 * @property \Carbon\Carbon|null updated_at
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use EntrustUserTrait;

    /** @var array $fillable 可大量指派的屬性 */
    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_code',
        'confirm_at',
        'register_at',
        'register_ip',
        'last_login_at',
        'last_login_ip',
    ];

    /** @var array $hidden 於JSON隱藏的屬性 */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @var array $dates 自動轉換為Carbon的屬性 */
    protected $dates = ['confirm_at', 'register_at', 'last_login_at'];

    /** @var int $perPage 分頁時的每頁數量 */
    protected $perPage = 20;

    /**
     * 帳號是否完成驗證
     *
     * @return bool
     */
    public function getIsConfirmedAttribute()
    {
        return !empty($this->confirm_at);
    }
}
