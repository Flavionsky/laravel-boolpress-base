<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        
        'category_id'=>App\Category::pluck('id')->random(),
        'title'=>$faker->sentence(),
        'author'=>$faker->name()

    ];
});
