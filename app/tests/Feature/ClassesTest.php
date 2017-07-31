<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ClassesTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function a_user_can_browse_classes() {
        $classes = factory('App\Tournamentclass', 10)->create();

        $this->get('/classes')
            ->assertStatus(200)
            ->assertSee($classes->random()->name);
    }

    /** @test */
    public function a_user_can_view_a_class() {

        $class = factory('App\Tournamentclass')->create();

        $this->get('/classes/' . $class->id)
            ->assertStatus(200)
            ->assertSee($class->name);
    }

}
