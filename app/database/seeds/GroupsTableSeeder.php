<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('nb_NO');
        $classes = App\Tournamentclass::with('teams', 'groups')->latest()->get();

        $classes->each(function($class) use ($faker) {

            $nrOfGroups = round($class->teams->count() / $class->group_size, 0, PHP_ROUND_HALF_DOWN);

            $groups = [];

            $alphabet = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');

            for( $i=0; $i<$nrOfGroups; $i++ ) {
                $groups[] = [
                    'name' => 'Group ' . $alphabet[$i],
                    'tournament_class_id' => $class->id,
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now(),
                ];
            }

            DB::table('groups')->insert($groups);            

        });

        $classes = App\Tournamentclass::with('teams', 'groups')->latest()->get();

        $classes->each(function($class) {

            $nrOfGroups = round($class->teams->count() / $class->group_size, 0, PHP_ROUND_HALF_DOWN);
            $teamChunks = $class->teams->chunk($nrOfGroups);

            $class->groups->each(function($group, $index) use ($teamChunks) {

                $teamChunks->get($index)->each(function($team) use ($group) {

                    // if ( $team->club_id == 1 )
                    //     echo 'update teams set group_id = ' . $group->id . ' where id = ' . $team->id . "\n";
                    // DB::update('update teams set group_id = ' . $group->id . ' where id = ' . $team->id);
                    $team->group_id = $group->id;
                    $team->save();

                });
            });

            // dd('stop');

        });
    }
}
