<?php

use App\Club;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [];

        $faker = \Faker\Factory::create('nb_NO');
        $classes = App\TournamentClass::latest()->get();

        Club::latest()->get()->each(function($club) use (&$teams, $faker, $classes) {

            foreach( ['Gutter', 'Jenter'] as $prefix ) {

                foreach(['90', '91', '92', '93', '94', '95', '96', '97', '98', '99', '00', '01', '02'] as $year) {
                    $teams[] = [
                        'user_id' => $club->user_id,
                        'club_id' => $club->id,
                        'tournament_class_id' => $classes->random()->id,
                        'name' => $prefix . ' ' . $year,
                        'contact_person' => $faker->name,
                        'email' => $faker->email,
                        'telephone' => $faker->phoneNumber,
                        'created_at' => Carbon\Carbon::now(),
                        'updated_at' => Carbon\Carbon::now()
                    ];
                }

            }

        });

        DB::table('teams')->insert($teams);
    }
}
