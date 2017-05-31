<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustPermissionTrait;

class Permission extends Model
{
    use NtrustPermissionTrait;

    /*
     * Role profile to get value from ntrust config file.
     */
    protected static $roleProfile = 'user';

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];
}
