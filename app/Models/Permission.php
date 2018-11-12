<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    public $table = 'permissions';
    public $primarykey = 'id';

    public static function scopeName($name)
    {
        return Permission::where('name', $name);
    }
    public static function scopePermission($permission)
    {
        return Permission::where('permission', $permission);
    }


}
