<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    
    $faker = Faker\Factory::create('nb_NO');

    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tournament::class, function (Faker\Generator $faker) {
    
    $faker = Faker\Factory::create('nb_NO');

    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        "name" => $faker->word,
        "club" => $faker->name,
        "start_date" => \Carbon\Carbon::now()->addDays(15),
        "end_date" => \Carbon\Carbon::now()->addDays(17),
        "location" => $faker->city,
        "registration_deadline" => \Carbon\Carbon::now()->addDays(10),
    ];
});

$factory->define(App\Club::class, function (Faker\Generator $faker) {
    
    $faker = Faker\Factory::create('nb_NO');

    return [
        'name' => $faker->name,
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'contact_person' => 'wtf',
        'email' => $faker->email,
        'telephone' => $faker->phoneNumber,
        'url' => $faker->domainName
    ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    
    $faker = Faker\Factory::create('nb_NO');

    return [
        'name' => $faker->name,
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'club_id' => function(){
            return factory('App\Club')->create()->id;
        },
        'tournament_class_id' => function(){
            return factory('App\Tournamentclass')->create()->id;
        },
        'contact_person' => 'wtf',
        'email' => $faker->email,
        'telephone' => $faker->phoneNumber
    ];
});

$factory->define(App\Tournamentclass::class, function (Faker\Generator $faker) {
    
    $faker = Faker\Factory::create('nb_NO');

    return [
        'name' => $faker->word,
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'type' => collect(['Group', 'Group + Finals'])->random(),
        'match_length' => 115,
        'group_size' => 5,
    ];
});