<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    public $table = 'users';
    public $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password','email_verified_at', 'lastname', 'firstname'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $encryptable = ['password'];
    public function getNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function role()
    {
        return $this->hasOne(UserRole::class);
    }
    public function admin()
    {
        return $this->hasOne(UserRole::class)->where('role_id', Role::where('slug', 'admin')->first()->id);
    }
    public function pm()
    {
        return $this->hasOne(UserRole::class)->where('role_id', Role::where('slug', 'pm')->first()->id);
    }
    public function staff()
    {
        return $this->hasOne(UserRole::class)->where('role_id', Role::where('slug', 'staff')->first()->id);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function issue()
    {
        return $this->hasMany(Issue::class);
    }

    public static function pmS()
    {
        return User::whereIn('id', UserRole::where('role_id', Role::where('slug', 'pm')->first()->id)->get()->pluck('user_id'))->whereNotNull('email_verified_at')->get()->pluck('name','id');

    }


    public static function hasPermission($name, $permission = '')
    {
        if(null == (Auth::user()))
            return 0;
        $roleId =Auth::user()->role->role_id;
        $permissionIds = RolePermission::where('role_id',$roleId)->pluck('permission_id');
        $permissions = Permission::whereIn('id', $permissionIds)->where('name', $name);
        if($permission !='')
            $permissions->where('permission', $permission);

        return $permissions->count();
    }
}
