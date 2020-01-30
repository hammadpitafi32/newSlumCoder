<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Posts;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'content' => $faker->text,
        'status' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
