<?php

use Faker\Generator as Faker;

$factory->define(App\FeatureDetail::class, function (Faker $faker) {
    return [
        'name' => $faker->word(1),
    ];
});
