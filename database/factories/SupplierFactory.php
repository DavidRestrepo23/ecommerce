<?php

use Faker\Generator as Faker;

$factory->define(App\Supplier::class, function (Faker $faker) {
    $name = $faker->firstname." ".$faker->lastname;
    return [
        'contactName' => $name,
        'companyName' => $faker->company,
        'telephone' => $faker->phoneNumber,
        'mobile' => $faker->e164PhoneNumber,
        'email' => $faker->companyEmail,
        'web' => $faker->domainName,
        'description' => $faker->sentence,
        'address' => $faker->address,
        'country' => $faker->country,
        'city' => $faker->city,
        'municipaly' => $faker->state,
        'neighborhood' => $faker->state,
        'logo' => $faker->imageUrl(120,60),
        'observations' => $faker->sentence,
    ];
});
