<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [ 'user_id', 'name', 'short_name', 'email', 'telephone', 'url' ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teams() {
        return $this->hasMany(Team::class, 'club_id');
    }

}
