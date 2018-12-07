<?php

use Faker\Generator as Faker;
use Waygou\Helpers\RandomModel;
use Waygou\Xheetah\Models\User;
use Waygou\Xheetah\Models\Client;
use Waygou\Xheetah\Models\MainRole;

$factory->define(User::class, function (Faker $faker) {

    // Randomize the main role between client user, employee and courier.
    $role = RandomModel::with(MainRole::class)->random();
    $client = $role->code == 'courier' ? 1 : RandomModel::with(Client::class)->except([1])->random();

    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'password'          => bcrypt('honda'),
        'phone'             => $faker->e164PhoneNumber,
        'is_active'         => true,
        'client_id'         => $client,
        'main_role_id'      => $role['id'],
    ];
});
