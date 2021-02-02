<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostInformation;
use Faker\Generator as Faker;

$factory->define(PostInformation::class, function (Faker $faker) {
    return [
        'post_id'=>App\Post::pluck('id')->random(),
        'description'=>$faker->paragraph(),
        'slug'=>$faker->slug()
    ];
});
