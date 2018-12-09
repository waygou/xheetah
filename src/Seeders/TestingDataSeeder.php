<?php

namespace Waygou\Xheetah\Seeders;

use Illuminate\Database\Seeder;
use Waygou\Xheetah\Models\User;
use Waygou\Xheetah\Models\Client;
use Waygou\Xheetah\Models\Address;
use Waygou\Xheetah\Models\Vehicle;
use Waygou\Surveyor\Models\Profile;
use Waygou\Xheetah\Models\Delivery;
use Waygou\Xheetah\Models\MainRole;
use Waygou\Xheetah\Models\CostCenter;
use Waygou\Xheetah\Models\VehicleType;
use Waygou\Xheetah\Models\DeliveryType;
use Waygou\Xheetah\Models\DurationType;

class TestingDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initial factories.
        factory(Client::class, 10)->create();
        factory(CostCenter::class, 10)->create();
        factory(Address::class, 10)->create();

        // Vehicle types.
        VehicleType::saveMany([
            ['name' => 'Truck',
             'code' => 'truck', ],

            ['name' => 'Car',
             'code' => 'car', ],

            ['name' => 'Motorcycle',
             'code' => 'motorcycle', ],
        ]);

        // After vehicle types.
        factory(Vehicle::class, 20)->create();

        // Duration types.
        DurationType::saveMany([
            ['name'              => 'Immediate',
             'code'              => 'immediate',
             'description'       => 'Immediate request for very urgent situations.',
             'requested_until'   => '16:00',
             'duration'          => '60',
             'time_type'         => 'M',
             'next_day_deadline' => '09:00', ],

            ['name'              => 'Urgent',
             'code'              => 'urgent',
             'description'       => 'Urgent request for somehow urgent situations.',
             'requested_until'   => '16:00',
             'duration'          => '2',
             'time_type'         => 'H',
             'next_day_deadline' => '11:00', ],

            ['name'              => 'Normal',
             'code'              => 'normal',
             'description'       => 'Standard request for non-urgent situations.',
             'requested_until'   => '14:00',
             'duration'          => '4',
             'time_type'         => 'H',
             'next_day_deadline' => '12:00', ],

            ['name'              => 'Next Day',
             'code'              => 'next-day',
             'description'       => 'Next day deliveries.',
             'requested_until'   => '15:00',
             'duration'          => '24',
             'time_type'         => 'H',
             'next_day_deadline' => '18:00', ],
        ]);

        // Users.
        factory(User::class, 30)->create()->each(function ($user) {

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

        User::saveMany([
            ['name'         => 'Admin',
             'email'        => 'admin@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654142',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'admin')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'admin')->first()->id);
        });

        User::saveMany([
            ['name'         => 'Client Admin',
             'email'        => 'clientadmin@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654143',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'client')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'client-admin')->first()->id);
        });

        User::saveMany([
            ['name'         => 'Client Standard',
             'email'        => 'clientstandard@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654144',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'client')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'client-standard')->first()->id);
        });

        User::saveMany([
            ['name'         => 'Client Display Only',
             'email'        => 'clientdisplayonly@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654144',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'client')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'client-display-only')->first()->id);
        });

        User::saveMany([
            ['name'         => 'Courier Standard',
             'email'        => 'courierstandard@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654145',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'courier')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'courier-standard')->first()->id);
        });

        User::saveMany([
            ['name'         => 'Courier Display Only',
             'email'        => 'courierdisplayonly@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654146',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'courier')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'courier-display-only')->first()->id);
        });

        User::saveMany([
            ['name'         => 'Employee Standard',
             'email'        => 'employeestandard@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654147',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'employee')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'employee-standard')->first()->id);
        });

        User::saveMany([
            ['name'         => 'Employee Finance',
             'email'        => 'employeefinance@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654148',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'employee')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'employee-finance')->first()->id);
        });

        User::saveMany([
            ['name'         => 'Employee Coordination',
             'email'        => 'employeecoordination@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654149',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'employee')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'employee-coordination')->first()->id);
        });

        User::saveMany([
            ['name'         => 'Employee Display Only',
             'email'        => 'employeedisplayonly@live.com',
             'password'     => bcrypt('honda'),
             'phone'        => '+41789654150',
             'client_id'    => 1, // The default client that is the courier company.
             'main_role_id' => MainRole::where('code', 'employee')->first()->id, ],
        ])->each(function ($user) {
            $user->profiles()->attach(Profile::where('code', 'employee-display-only')->first()->id);
        });

        // Delivery types.
        DeliveryType::saveMany([['name'                     => 'Imediato (Carro)',
                                'code'                     => 'imediate-car',
                                'duration_type_id'         => DurationType::where('code', 'immediate')->first()->id,
                                'vehicle_type_id'          => VehicleType::Where('code', 'car')->first()->id,
                                'price_request'            => 5,
                                'price_request_additional' => 8,
                                'price_km'                 => 0.25,
                                'price_km_additional'      => 0.35, ],
                               ['name'                     => 'Imediato (Furgon)',
                                'code'                     => 'imediate-truck',
                                'duration_type_id'         => DurationType::where('code', 'immediate')->first()->id,
                                'vehicle_type_id'          => VehicleType::Where('code', 'truck')->first()->id,
                                'price_request'            => 8,
                                'price_request_additional' => 14,
                                'price_km'                 => 0.35,
                                'price_km_additional'      => 0.45, ],
                               ['name'                     => 'Imediato (Moto)',
                                'code'                     => 'imediate-motorcyle',
                                'duration_type_id'         => DurationType::where('code', 'immediate')->first()->id,
                                'vehicle_type_id'          => VehicleType::Where('code', 'motorcycle')->first()->id,
                                'price_request'            => 4,
                                'price_request_additional' => 6,
                                'price_km'                 => 0.15,
                                'price_km_additional'      => 0.25, ],
                            ]);

        // Create deliveries.
        factory(Delivery::class, 10)->create();
    }
}
