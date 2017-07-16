<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function teams() {
        return $this->hasMany('App\Team');
    }
}
