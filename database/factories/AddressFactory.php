<?php

use Faker\Generator as Faker;
use Waygou\Xheetah\Models\Address;

$factory->define(Address::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\en_US\Company($faker));

    // Can be a Cost Center address, or a Client address, randomly.

    $type = rand(0, 1);

    $ad_id = seed_rand_id('clients', 'id');
    $ad_type = 'Waygou\Xheetah\Models\Client';

    if ($type == 0) {
        $ad_id = seed_rand_id('cost_centers', 'id');
        $ad_type = 'Waygou\Xheetah\Models\CostCenter';
    }

    return [
        'name'             => $faker->catchPhrase,
        'address'          => $faker->streetAddress,
        'postal_code'      => $faker->postcode,
        'locality'         => $faker->state,
        'city'             => $faker->city,
        'country_code'     => $faker->countryCode,
        'country'          => $faker->country,
        'map'              => $faker->latitude.','.$faker->longitude,
        'addressable_id'   => $ad_id,
        'addressable_type' => $ad_type,
    ];
});
