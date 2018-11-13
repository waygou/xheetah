<?php

use Faker\Generator as Faker;
use Waygou\Xheetah\Models\CostCenter;

$factory->define(CostCenter::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\fr_FR\Address($faker));

    return [
        'name'           => $faker->departmentName,
        'client_id'      => seed_rand_id('clients', 'id'),
        'contact_name'   => $faker->name,
        'contact_phone'  => $faker->e164PhoneNumber,
        'contact_email'  => $faker->email,
        'is_active'      => true,
    ];
});
