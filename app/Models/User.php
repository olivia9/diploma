<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'login', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function role()
    {
        return $this->hasMany(UserRole::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

   /* public function can()
    {

    }*/
}
