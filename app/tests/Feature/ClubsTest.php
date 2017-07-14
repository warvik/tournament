<?php

namespace Tests\Feature;

use App\Club;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ClubsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_clubs() {

        $clubs = factory('App\Club')->create();

        $this->get('/clubs')
            ->assertStatus(200)
            ->assertSee($clubs->first()->name);
    }

    /** @test */
    public function a_user_can_view_a_club() {
        $club = factory('App\Club')->create();

        $this->get('/clubs/' . $club->id)
            ->assertStatus(200)
            ->assertSee($club->name);
    }

    /** @test */
    public function an_authenticated_user_can_create_a_club() {

        \Session::start();
        
        $this->actingAs(factory('App\User')->create(['name' => 'yes']));
        $club = factory('App\Club')->make()->load('user');
        // dd($club->toArray());

        $response = $this->post('/clubs', array_merge(
            $club->toArray(),
            ['_token' => app('session')->token()]
        ));

        $this->get($response->headers->get('Location'))
            ->assertStatus(200)
            ->assertSee($club->name);
    }

    /** @test */
    public function an_authenticated_user_can_delete_a_club() {
        \Session::start();
        
        $club = factory('App\Club')->create();
        $club->load('user');

        $this->actingAs($club->user);

        $response = $this->delete('/clubs/' . $club->id, [ '_token' => app('session')->token()]);

        $this->assertDatabaseMissing('clubs', [ 'id' => $club->id ]);
    }

    /** @test */
    public function an_authenticated_user_can_update_a_club() {
        \Session::start();
        
        $club = factory('App\Club')->create();
        
        $oldTitle = $club->title;
        $newTitle = 'Clubs new title';

        $club->load('user');

        $this->actingAs($club->user);

        $data = array_merge(
            $club->toArray(),
            [
                '_token' => app('session')->token(),
                'name' => $newTitle
            ]
        );

        $this->patch('/clubs/' . $club->id, $data);
        
        $this->get('/clubs/' . $club->id)
            ->assertStatus(200)
            ->assertSee($newTitle);
    }
}
