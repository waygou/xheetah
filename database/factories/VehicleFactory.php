<?php

use Faker\Generator as Faker;
use Waygou\Xheetah\Models\Vehicle;

$factory->define(Vehicle::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));

    return [
        'brandmodel'      => $faker->vehicle,
        'vehicle_type_id' => seed_rand_id('vehicle_types', 'id'),
        'since'           => $faker->date,
        'registration'    => $faker->vehicleRegistration('[A-Z]{2}-[A-Z]{2}'),
        'license_plate'   => $faker->vehicleRegistration('[A-Z]{2}-[0-9]{2}-[0-9]{2}'),
    ];
});
