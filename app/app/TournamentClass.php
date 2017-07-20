<?php

namespace App;

use App\Generators\TeamsIntoGroupsGenerator;
use Illuminate\Database\Eloquent\Model;

class Tournamentclass extends Model
{
    public function teams() {
        return $this->hasMany('App\Team', 'tournament_class_id');
    }

    public function groups() {
        return $this->hasMany('App\Group', 'tournament_class_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function createGroups($forceRecreate = false) {

        if ( $forceRecreate ) {
            $this->groups->each(function($group){ $group->delete(); });
        }

        $groups = (new TeamsIntoGroupsGenerator($this))->generate();

        $groups->each(function($item, $index){
            $group = new Group(['tournament_class_id' => $this->id, 'name' => 'Group ' . $index]);

            $group->save();

            $item->each(function($teamId) use ($group) {
                $team = Team::findOrFail($teamId);
                $team->group_id = $group->id;
                $team->save();
            });
        });

        return $groups;
    }

}
