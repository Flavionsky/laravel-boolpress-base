<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostInformation;
use Faker\Generator as Faker;

$factory->define(PostInformation::class, function (Faker $faker) {
    return [
        'post_id'=> $faker->unique()->numberBetween(1, 100),
        'description'=> $faker->paragraph(3),
        'slug'=> $faker->slug()
    ];
});
