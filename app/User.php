<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Klaravel\Ntrust\Traits\NtrustUserTrait;

class User extends Authenticatable
{
    use NtrustUserTrait;
    use Notifiable;

    /*
     * Role profile to get value from ntrust config file.
     */
    protected static $roleProfile = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
