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
        $faker = \Faker\Factory::create('nb_NO');
        $user_ids = collect(DB::select('select id from users order by id ASC'));

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
            ],
            [
                'user_id' => $user_ids->random()->id,
                'name' => 'Kvaløysletta Sportsklubb',
                'short_name' => 'KSK',
                'contact_person' => 'Pål Wilhelmsen',
                'email' => 'post@kvaloyask.no',
                'telephone' => '77 65 23 50 / 93 28 35 50',
                'url' => 'kvaloyask.no',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ],
            [
                'user_id' => $user_ids->random()->id,
                'name' => 'IF FLøya',
                'short_name' => 'Fløya',
                'contact_person' => 'John W. Olsen',
                'email' => 'john@floya.no',
                'telephone' => '91 55 64 11',
                'url' => 'floya.no',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ],
            [
                'user_id' => $user_ids->random()->id,
                'name' => 'Stakkevollan Idrettsforening',
                'short_name' => 'Stakkevollan',
                'contact_person' => 'Anja Benjaminsen-Harjo',
                'email' => 'post@stakkevollan.com',
                'telephone' => '4833 1982',
                'url' => 'www.stakkevollan.com',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ],
            [
                'user_id' => $user_ids->random()->id,
                'name' => 'Reinen Idrettslag',
                'short_name' => 'Reinen',
                'contact_person' => $faker->name,
                'email' => 'post@reinen.no',
                'telephone' => $faker->phoneNumber,
                'url' => 'www.reinen.no',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ],
            [
                'user_id' => $user_ids->random()->id,
                'name' => 'Krokelvdalen Idrettslag',
                'short_name' => 'Kroken',
                'contact_person' => $faker->name,
                'email' => 'post@krokelvdalen.no',
                'telephone' => $faker->phoneNumber,
                'url' => 'www.krokelvdalen.no',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ]
        ];
        DB::table('clubs')->insert($clubs);
    }
}
