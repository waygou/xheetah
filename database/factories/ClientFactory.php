<?php

use Faker\Generator as Faker;
use Waygou\Xheetah\Models\Client;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'           => $faker->company,
        'fiscal_number'  => $faker->ean13,
        'address'        => $faker->streetAddress,
        'postal_code'    => $faker->postcode,
        'locality'       => $faker->state,
        'city'           => $faker->city,
        'country'        => $faker->countryCode,
        'contract_start' => $faker->date('Y-m-d'),
        'contact_name'   => $faker->name,
        'contact_phone'  => $faker->e164PhoneNumber,
        'contact_email'  => $faker->email,
    ];
});
