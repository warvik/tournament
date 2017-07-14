<?php

use Illuminate\Database\Seeder;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user_ids = collect(DB::select('select id from users order by id ASC'));
        // dd($user_ids->random()->id);
        $clubs = [
            [
                'user_id' => $user_ids->random()->id,
                'name' => 'Tromsø Idrettslag',
                'short_name' => 'TIL',
                'contact_person' => 'Morten Kræmer',
                'email' => 'post@til.no',
                'telephone' => '77612345',
                'url' => 'www.til.no',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ],
            [
                'user_id' => $user_ids->random()->id,
                'name' => 'Tromsdalen ungdoms og idrettslag',
                'short_name' => 'TUIL',
                'contact_person' => 'Thomas Heide',
                'email' => 'post@tuil.no',
                'telephone' => '77612345',
                'url' => 'www.tuil.no',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ]
        ];
        DB::table('clubs')->insert($clubs);
    }
}
