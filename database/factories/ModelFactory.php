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
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10)
    ];
});


$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text($maxNbChars = 20),
        'year' => $faker->year($max = 'now'),
        'description' => $faker->text($maxNbChars = 200),
        'genre' => $faker->text($maxNbChars = 10),
        'author' => $faker->name,
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
        'img' => $faker->imageUrl(400, 300, 'cats') 
    ];
});