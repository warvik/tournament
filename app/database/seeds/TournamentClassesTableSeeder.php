<?php

use Illuminate\Database\Seeder;

class TournamentclassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [];
        $type = collect(['Group', 'Group + Finals']);
        $users = App\User::latest()->get();

        foreach( ['Gutter', 'Jenter'] as $prefix ) {

            foreach(['02', '03', '04', '05', '06', '07'] as $year) {
                $classes[] = [
                    'user_id' => $users->random()->id,
                    'name' => $prefix . ' ' . $year,
                    'type' => $type->random(),
                    'match_length' => 105,
                    'group_size' => 5,
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ];
            }

        }

        DB::table('tournamentclasses')->insert($classes);

    }
}
