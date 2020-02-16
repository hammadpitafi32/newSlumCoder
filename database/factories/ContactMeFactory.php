<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ContactMe;
use Faker\Generator as Faker;

$factory->define(ContactMe::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'subject' => $faker->word,
        'message' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
