<?php

use Faker\Generator as Faker;

$factory->define(App\ProductImage::class, function (Faker $faker) {
    return [
        'name' => $faker->word(2),
        'url' => '600x900.png',
    ];
});
