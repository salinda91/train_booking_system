<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $guarded = [];
    public function createdBy()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }
}
