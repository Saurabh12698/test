<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Community::class, function (Faker $faker) {
    return [
        'cid' => Uuid::generate(4),
        'uid' => Uuid::generate(4),
        'name' => $faker->name,
        'url' => 'default.jpg',
        'description' => $faker->text,
        'tags' => join(',', $faker->words(4)),
        'typeofcmty' => 1,
        'cndtion' => 1,
    ];
});
