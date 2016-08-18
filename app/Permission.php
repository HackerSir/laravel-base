<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

/**
 * 權限
 *
 * @property-read int id
 * @property string name
 * @property string display_name
 * @property string description
 * @property bool protection
 *
 * @property \Illuminate\Database\Eloquent\Collection|Role[] roles
 *
 * @property \Carbon\Carbon|null created_at
 * @property \Carbon\Carbon|null updated_at
 * @mixin \Eloquent
 */
class Permission extends EntrustPermission
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'protection',
    ];

    /**
     * @param $roleName
     *
     * @return bool
     */
    public function hasRole($roleName)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $roleName) {
                return true;
            }
        }

        return false;
    }
}
