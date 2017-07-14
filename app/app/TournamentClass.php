<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentClass extends Model
{
    public function teams() {
        return $this->hasMany('App\Team', 'tournament_class_id');
    }
}
