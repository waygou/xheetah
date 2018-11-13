<?php

use Faker\Generator as Faker;
use Waygou\Xheetah\Models\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => null,
        'password'          => bcrypt('honda'),
        'phone'             => $faker->e164PhoneNumber,
        'is_active'         => true,
        'client_id'         => seed_rand_id('clients', 'id'),
        'main_role_id'      => seed_rand_id('main_roles', 'id'),
        'remember_token'    => str_random(10),
    ];
});
