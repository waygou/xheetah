<?php

use Faker\Generator as Faker;
use Waygou\Helpers\RandomModel;
use Waygou\Xheetah\Models\Client;
use Waygou\Xheetah\Models\Address;
use Waygou\Xheetah\Models\CostCenter;

$factory->define(Address::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\en_US\Company($faker));

    // Can be a Cost Center address, or a Client address, randomly.
    $type = rand(0, 1);

    $adm = $type == 0 ? CostCenter::class : Client::class;
    $model = RandomModel::with($adm)->random();

    return [
        'name'             => $faker->catchPhrase,
        'address'          => $faker->streetAddress,
        'postal_code'      => $faker->postcode,
        'locality'         => $faker->state,
        'city'             => $faker->city,
        'country_code'     => $faker->countryCode,
        'country'          => $faker->country,
        'map'              => $faker->latitude.','.$faker->longitude,
        'addressable_id'   => $model->id,
        'addressable_type' => get_class($model),
    ];
});
