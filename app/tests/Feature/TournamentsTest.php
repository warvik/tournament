<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TournamentsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_tournaments() {
        
        $tournaments = $this->getTournaments()->random(20)->map(function($tournament, $index) {
            return factory('App\Tournament')->create($tournament);
        });

        $response = $this->get('/tournaments');

        $tournaments->each(function($tournament) use ($response) {
            $response->assertSee($tournament->name);
        });

        // dd($tournaments->toArray());

    }

    /** @test */
    public function a_user_can_visit_a_tournament() {
        
        $tournament = $this->getTournaments()->random(1)->map(function($tournament, $index) {
            return factory('App\Tournament')->create($tournament);
        })->first();

        $this->get('/tournaments/' . $tournament->id)
            ->assertSee($tournament->name);

        // $response = $this->get('/tournaments');

        // $tournaments->each(function($tournament) use ($response) {
        //     $response->assertSee($tournament->name);
        // });

        // dd($tournaments->toArray());

    }

    private function getTournaments() {

        $faker = \Faker\Factory::create('nb_NO');
        
        $tournaments = collect([
            [
                "name" => "BOIF vinterserie 2017",
                "club" => "Bardufoss og Omegn IF",
                "start_date" => \Carbon\Carbon::parse("07.01.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("23.04.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Bardufoss storhall",
                "registration_deadline" => \Carbon\Carbon::parse("10.12.2016 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "OBS Cup 2017",
                "club" => "Fotballklubben Landsås",
                "start_date" => \Carbon\Carbon::parse("21.01.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("22.01.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Harstad",
                "registration_deadline" => \Carbon\Carbon::parse("15.01.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "SOL CUP 2017",
                "club" => "Storelva Allidrettslag",
                "start_date" => \Carbon\Carbon::parse("21.01.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("22.01.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Tromsø",
                "registration_deadline" => \Carbon\Carbon::parse("09.01.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Fløyaturneringa 2017",
                "club" => "Fløya, IF",
                "start_date" => \Carbon\Carbon::parse("27.01.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("29.01.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Fløyahallen",
                "registration_deadline" => \Carbon\Carbon::parse("26.01.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Extra Cup 2017",
                "club" => "Kvæfjord IL Fotball",
                "start_date" => \Carbon\Carbon::parse("28.01.2017 09:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("29.01.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Borkenes",
                "registration_deadline" => \Carbon\Carbon::parse("24.01.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Hamna Turneringa 2017",
                "club" => "Hamna Idrettslag",
                "start_date" => \Carbon\Carbon::parse("10.03.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("12.03.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Hamna",
                "registration_deadline" => \Carbon\Carbon::parse("09.03.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Lyngenturnering for Jenter",
                "club" => "Lyngen/Karnes IL",
                "start_date" => \Carbon\Carbon::parse("18.03.2017 09:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("19.03.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Lyngseidet",
                "registration_deadline" => \Carbon\Carbon::parse("12.03.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Lyngenturnering for gutter",
                "club" => "Lyngen/Karnes IL",
                "start_date" => \Carbon\Carbon::parse("25.03.2017 09:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("25.03.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Eidebakken lyngen",
                "registration_deadline" => \Carbon\Carbon::parse("18.03.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Lyngenturneringa 2017",
                "club" => "Lyngen/Karnes IL",
                "start_date" => \Carbon\Carbon::parse("01.04.2017 09:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("01.04.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Lyngseidet ",
                "registration_deadline" => \Carbon\Carbon::parse("18.03.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Bardu Cup 17",
                "club" => "Bardu Idrettslag",
                "start_date" => \Carbon\Carbon::parse("22.04.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("23.04.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Setermoen",
                "registration_deadline" => \Carbon\Carbon::parse("07.04.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Harstad Cup 2017",
                "club" => "Fotballklubben Landsås",
                "start_date" => \Carbon\Carbon::parse("28.04.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("30.04.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Harstad",
                "registration_deadline" => \Carbon\Carbon::parse("30.04.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Harstad Cup 2017",
                "club" => "Fotballklubben Landsås",
                "start_date" => \Carbon\Carbon::parse("28.04.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("30.04.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Harstad",
                "registration_deadline" => \Carbon\Carbon::parse("30.04.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Signal Cup 2017",
                "club" => "Fløya, IF",
                "start_date" => \Carbon\Carbon::parse("28.04.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("01.05.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Fløyabanen",
                "registration_deadline" => \Carbon\Carbon::parse("27.04.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Lerøy Turneringa 2017",
                "club" => "Skjervøy IK",
                "start_date" => \Carbon\Carbon::parse("12.05.2017 18:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("14.05.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Skjervøy",
                "registration_deadline" => \Carbon\Carbon::parse("07.05.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Lille Blåmann",
                "club" => "Blåmann, IL",
                "start_date" => \Carbon\Carbon::parse("19.05.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("21.05.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Ersfjordbotn ",
                "registration_deadline" => \Carbon\Carbon::parse("01.05.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Eat Move Sleep Cup Finnsnes",
                "club" => "Finnsnes IL",
                "start_date" => \Carbon\Carbon::parse("26.05.2017 09:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("28.05.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Finnsnes Idrettspark",
                "registration_deadline" => \Carbon\Carbon::parse("13.05.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Hålogaland Kraft Kilkam Cup 2017",
                "club" => "If Kilkameratene",
                "start_date" => \Carbon\Carbon::parse("10.06.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("11.06.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Harstad",
                "registration_deadline" => \Carbon\Carbon::parse("26.05.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Krokenturneringen 2017",
                "club" => "Krokelvdalen Idrettslag",
                "start_date" => \Carbon\Carbon::parse("10.06.2017 08:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("11.06.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Kroken",
                "registration_deadline" => \Carbon\Carbon::parse("02.06.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Sparebanken Narvik Fotballskole",
                "club" => "Grovfjord Idrettslag",
                "start_date" => \Carbon\Carbon::parse("10.06.2017 10:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("11.06.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Grovfjord",
                "registration_deadline" => \Carbon\Carbon::parse("06.06.2017 15:30")->format('Y-m-d H:i:s'),
            ],
            [
                "name" => "Bardufoss Cup 2017",
                "club" => "Bardufoss og Omegn IF",
                "start_date" => \Carbon\Carbon::parse("16.06.2017 16:00")->format('Y-m-d H:i:s'),
                "end_date" => \Carbon\Carbon::parse("18.06.2017 16:00")->format('Y-m-d H:i:s'),
                "location" => "Bardufoss, Rustahøgda",
                "registration_deadline" => \Carbon\Carbon::parse("15.05.2017 15:30")->format('Y-m-d H:i:s'),

            ]
        ])->map(function($item){
            $item['user_id'] = factory('App\User')->create()->id;

            return $item;
        });

        return $tournaments;
    }

}
