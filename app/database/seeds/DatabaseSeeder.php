<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TournamentclassesTableSeeder::class);
        $this->call(ClubTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        // $this->call(GroupsTableSeeder::class);
    }
}
