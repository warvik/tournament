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

        // dd($classes->toArray());

        Club::latest()->get()->each(function($club) use (&$teams, $faker, $classes) {

            $classes->each(function($class) use (&$teams, $faker, $club) {

                list($gender, $year) = explode(' ', $class->name);

                $numberOfClubTeamsForClass = $faker->numberBetween(1, 4);

                for( $i=1; $i<=$numberOfClubTeamsForClass; $i++ ) {

                    $teams[] = [
                        'user_id' => $club->user_id,
                        'club_id' => $club->id,
                        'tournament_class_id' => $class->id,
                        'name' => $gender . ' ' . $year . ($numberOfClubTeamsForClass > 1 ? ' ' . $i . '. lag' : ''),
                        'contact_person' => $faker->name,
                        'email' => $faker->email,
                        'telephone' => $faker->phoneNumber,
                        'created_at' => Carbon\Carbon::now(),
                        'updated_at' => Carbon\Carbon::now()
                    ];

                }
            });

            // foreach( ['Gutter', 'Jenter'] as $prefix ) {

            //     foreach(['02', '03', '04'] as $year) {

            //         $numberOfClubTeamsForClass = $faker->numberBetween(1, 4);

            //         for( $i=1; $i<=$numberOfClubTeamsForClass; $i++ ) {

            //             $teams[] = [
            //                 'user_id' => $club->user_id,
            //                 'club_id' => $club->id,
            //                 'tournament_class_id' => $classes->random()->id,
            //                 'name' => $year . ($numberOfClubTeamsForClass > 1 ? ' ' . $i . '. lag' : ''),
            //                 'contact_person' => $faker->name,
            //                 'email' => $faker->email,
            //                 'telephone' => $faker->phoneNumber,
            //                 'created_at' => Carbon\Carbon::now(),
            //                 'updated_at' => Carbon\Carbon::now()
            //             ];

            //         }
            //     }

            // }

        });

        // dd($teams);

        DB::table('teams')->insert($teams);
    }
}
