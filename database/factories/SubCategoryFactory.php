<?php

use Faker\Generator as Faker;

$factory->define(App\SubCategory::class, function (Faker $faker) {
    $name = $faker->word(1);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(128),
    ];
});
