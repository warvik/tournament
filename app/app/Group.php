<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'tournament_class_id'];

    public function teams() {
        return $this->hasMany('App\Team');
    }

    public function tournamentclass() {
        return $this->belongsTo('App\Tournamentclass', 'tournament_class_id');
    }
}
