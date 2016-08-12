<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

/**
 * 角色
 *
 *
 * @property-read int id
 * @property string name
 * @property string display_name
 * @property string description
 * @property string color
 * @property bool protection
 *
 * @property \Carbon\Carbon|null created_at
 * @property \Carbon\Carbon|null updated_at
 * @mixin \Eloquent
 */
class Role extends EntrustRole
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'color',
        'protection',
    ];

    public static $validColors = [
        'grey',
        'red',
        'orange',
        'yellow',
        'olive',
        'green',
        'teal',
        'blue',
        'violet',
        'purple',
        'pink',
        'brown',
        'black',
    ];

    public function getColorAttribute()
    {
        $color = $this->getOriginal('color');
        $color = strtolower($color);
        if (!in_array($color, static::$validColors)) {
            $color = array_first(static::$validColors);
        }

        return $color;
    }

    public function getTagAttribute()
    {
        return "<span class=\"ui tag label single line {$this->color}\">{$this->display_name}</span>";
    }
}
