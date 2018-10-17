<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Project extends Model
{

    public $table = 'projects';
    public $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function pm()
    {
        return $this->belongsTo(User::class);
    }
}
