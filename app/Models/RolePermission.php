<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{

    public $table = 'role_permissions';
    public $primarykey = 'id';

    public function role()
    {
        return $this->hasMany(Role::class, 'id', 'role_id');
    }

    public function permission()
    {
        return $this->hasMany(Permission::class,'id','permission_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
}
