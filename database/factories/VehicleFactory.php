<?php

use Faker\Generator as Faker;
use Waygou\Helpers\RandomModel;
use Waygou\Xheetah\Models\Vehicle;
use Waygou\Xheetah\Models\VehicleType;

$factory->define(Vehicle::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));

    return [
        'brandmodel'      => $faker->vehicle,
        'vehicle_type_id' => RandomModel::with(VehicleType::class)->random(),
        'since'           => $faker->date,
        'registration'    => $faker->vehicleRegistration('[A-Z]{2}-[A-Z]{2}'),
        'license_plate'   => $faker->vehicleRegistration('[A-Z]{2}-[0-9]{2}-[0-9]{2}'),
    ];
});
