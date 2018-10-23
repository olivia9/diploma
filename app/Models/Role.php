<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public $table = 'roles';
    public $primarykey = 'id';

    public function scopeAdmin()
    {
        return Role::where('slug', 'admin')->first()->id;
    }
    public static function scopePm()
    {
        return Role::where('slug', 'pm')->first()->id;
    }
    public static function scopeStaff()
    {
        return Role::where('slug', 'staff')->first()->id;
    }
   /* public static function adminId()
    {
        return Role::where('slug', 'admin')->first()->id;
    }
    public static function pmId()
    {
        return Role::where('slug', 'pm')->first()->id;
    }
    public static function idStaff()
    {
        return Role::where('slug', 'staff')->first()->id;
    }*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
}
