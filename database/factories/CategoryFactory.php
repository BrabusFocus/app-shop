<?php

use Faker\Generator as Faker;
use Facrinama\Category;
$factory->define(Category::class, function (Faker $faker) {
    return [
        //
        'name' => ucfirst($faker->word),
        'description' => $faker->sentence(10)
    ];
});
