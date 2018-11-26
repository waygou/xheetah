<?php

use Faker\Generator as Faker;
use Waygou\Xheetah\Models\Client;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'           => $faker->company,
        'fiscal_number'  => $faker->ean13,
        'contract_start' => $faker->date('Y-m-d'),
        'social_name'    => $faker->company,
        'contact_name'   => $faker->name,
        'contact_phone'  => $faker->e164PhoneNumber,
        'contact_email'  => $faker->email,
    ];
});
