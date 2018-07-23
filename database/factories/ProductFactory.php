<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    $title = $faker->word(2);
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'reference' => rand(10000,99999),
        'price' => rand(15000, 45000),
        'summary' => $faker->text(35),
        'description' => $faker->text(100),
        'stock' => rand(20,100),
        'supplier_id' => rand(1,5),
    ];
});
