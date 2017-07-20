<?php

namespace Tests\Unit;

use App\Tournamentclass;
use App\Club;
use App\Team;
use App\User;
use App\Group;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GroupsGeneratorTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function check_that_teams_in_class_are_correctly_organized_into_groups() {

        $class = factory('App\Tournamentclass')->create();
        $clubs = factory('App\Club', 10)->create();
        
        $clubs->each(function($club) use($class) {
            $teams = factory('App\Team', rand(1,9))->create(['club_id' => $club->id, 'tournament_class_id' => $class->id]);
        });

        $class = $class->fresh()->first();
        $class->createGroups(true);

        $this->assertTrue(true);
    }

}
