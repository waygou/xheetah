<?php

use Faker\Generator as Faker;
use Waygou\Helpers\RandomModel;
use Waygou\Xheetah\Models\Client;
use Waygou\Xheetah\Models\CostCenter;

$factory->define(CostCenter::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\fr_FR\Address($faker));

    return [
        'name'           => $faker->departmentName,
        'client_id'      => RandomModel::with(Client::class)->except([1])->random(),
        'contact_name'   => $faker->name,
        'contact_phone'  => $faker->e164PhoneNumber,
        'contact_email'  => $faker->email,
        'is_active'      => true,
    ];
});
