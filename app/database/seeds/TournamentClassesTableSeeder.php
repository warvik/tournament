<?php

use Illuminate\Database\Seeder;

class TournamentClassesTableSeeder extends Seeder
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

            foreach(['90', '91', '92', '93', '94', '95', '96', '97', '98', '99', '00', '01', '02'] as $year) {
                $classes[] = [
                    'user_id' => $users->random()->id,
                    'name' => $prefix . ' ' . $year,
                    'type' => $type->random(),
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ];
            }

        }

        DB::table('tournament_classes')->insert($classes);

    }
}
