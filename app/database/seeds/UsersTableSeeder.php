<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [];

        $n = 0;
        while( $n < 100 ) {
            $users[] = array_merge(
                factory('App\User')->raw(),
                [
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now(),
                ]
            );
            $n++;
        }

        DB::table('users')->insert($users);
    }
}
