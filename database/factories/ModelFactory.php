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


$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->first_name,
        'last_name' => $faker->last_name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('12345678'),
        'remember_token' => str_random(10),
    ];
});
*/

$factory->define(App\PlayTogether::class, function ($faker) {
  return [
    'title' => $faker->sentence(mt_rand(3, 10)),
    'content_1' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'content_2' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'content_3' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'content_4' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'unit_1_title' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'unit_2_title' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'unit_2_description' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
    'created_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
  ];
});