<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueType extends Model
{

    public $table = 'issue_types';
    public $primarykey = 'id';

    public function issue()
    {
        return $this->hasOne(Issue::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
}
