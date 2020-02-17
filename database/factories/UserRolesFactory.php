<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserRoles;
use Faker\Generator as Faker;

$factory->define(UserRoles::class, function (Faker $faker) {

    return [
        'model_type' => $faker->word,
        'model_id' => $faker->word
    ];
});
