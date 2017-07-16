<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['user_id', 'club_id', 'tournament_class_id', 'group_id', 'name', 'email', 'telephone'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function club() {
        return $this->belongsTo(Club::class, 'club_id');
    }

    public function tournamentClass() {
        return $this->belongsTo(TournamentClass::class, 'tournament_class_id');
    }
}
