<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueStatus extends Model
{

    public $table = 'issue_statuses';
    public $primarykey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function issue()
    {
        return $this->hasOne(Issue::class);
    }
}
