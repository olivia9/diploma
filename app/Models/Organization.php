<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organizations';
    protected $fillable = ['name','confirm'];

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
