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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Portfolio::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->words(3,TRUE),
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Building::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->words(3,TRUE),
        'address1' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => 'FL',
        'postal_code' => $faker->postcode,
        'country_id' => 12,
        'work_phone' => $faker->phoneNumber,
        'description' => $faker->paragraph,
        'owner' => $faker->name,
    ];
});