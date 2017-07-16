<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournamentclass extends Model
{
    public function teams() {
        return $this->hasMany('App\Team', 'tournament_class_id');
    }

    public function groups() {
        return $this->hasMany('App\Group', 'tournament_class_id');
    }
}
