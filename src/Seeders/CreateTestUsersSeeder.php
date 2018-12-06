<?php

namespace Waygou\Xheetah\Seeders;

use Illuminate\Database\Seeder;
use Waygou\Xheetah\Models\User;
use Waygou\Xheetah\Models\Client;
use Waygou\Surveyor\Models\Profile;
use Waygou\Xheetah\Models\MainRole;

class CreateTestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, 1)->create();

        // One user per profile with the same username.
        // Attach the respective main role, and the respective profile.
        User::saveMany([
            ['name'         => 'Super Admin',
             'email'        => 'superadmin@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654141',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'super-admin')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'super-admin')->first()->id);
        });

        // Users.
        factory(User::class, 5000)->create()->each(function ($user) {

            // Apply the respective standard profile accordingly to the user main role.
            switch ($user->mainRole->code) {
                case 'client':
                    $user->profiles()->attach(Profile::where('code', 'client-standard')->first());
                    break;

                case 'courier':
                    $user->profiles()->attach(Profile::where('code', 'courier-standard')->first());
                    break;

                case 'employee':
                    $user->profiles()->attach(Profile::where('code', 'employee-standard')->first());
                    break;

                case 'admin':
                    $user->profiles()->attach(Profile::where('code', 'admin')->first());
                    break;

                case 'super-admin':
                    $user->profiles()->attach(Profile::where('code', 'super-admin')->first());
                    break;
            }
        });
    }
}
