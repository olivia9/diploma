<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{

    public $table = 'issues';
    public $primarykey = 'id';

    public function executor()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
}
