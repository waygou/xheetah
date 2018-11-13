<?php

use Illuminate\Database\Seeder;
use Waygou\Surveyor\Models\Policy;
use Waygou\Surveyor\Models\Profile;
use Waygou\Surveyor\Models\Scope;
use Waygou\Xheetah\Models\Client;
use Waygou\Xheetah\Models\Configuration;
use Waygou\Xheetah\Models\MainRole;
use Waygou\Xheetah\Models\User;

class XheetahSchemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Main configuration.
        Configuration::create(['name'        => 'Application version',
                               'description' => 'Current application version.',
                               'code'        => 'application-version',
                               'value'       => '0.0.1', ]);

        Configuration::create(['name'        => 'Tenant Application Key',
                               'description' => 'Tentant application key for all API transactions.',
                               'code'        => 'tenant-key',
                               'value'       => str_random(10), ]);

        // Load main roles.
        // A main role will allow the system to automatically inject business rules
        // in case it's necessary.
        MainRole::saveMany([
            ['name' => 'Client based', 'code' => 'client'],
            ['name' => 'Courier based', 'code' => 'courier'],
            ['name' => 'Employee based', 'code' => 'employee'],
            ['name' => 'Admin based', 'code' => 'admin'],
            ['name' => 'Super admin based', 'code' => 'super-admin'],
        ]);

        // Load default profiles.
        Profile::saveMany([
            ['name' => 'Super Admin', 'code' => 'super-admin', 'description' => 'Super admin profile, view everything and has access to system tools.'],
            ['name' => 'Admin', 'code' => 'admin', 'description' => 'Admin profile, access to manage all data entities, except access to system tools.'],
            ['name' => 'Client Admin', 'code' => 'client-admin', 'description' => 'Access to modify its own client data, and to add new users to its own client.'],
            ['name' => 'Client Standard', 'code' => 'client-standard', 'description' => 'Access to create new service requests. Display only access to client data.'],
            ['name' => 'Client Display Only', 'code' => 'client-display-only', 'description' => 'Access to its own client as display only.'],
            ['name' => 'Courier Standard', 'code' => 'courier-standard', 'description' => 'Access to its own Courier data, can also manage its own service requests.'],
            ['name' => 'Courier Display Only', 'code' => 'courier-display-only', 'description' => 'Access to its own Courier data as display only.'],
            ['name' => 'Employee Standard', 'code' => 'employee-standard', 'description' => 'Access to Employee features, and to manage allowed data in a daily basis.'],
            ['name' => 'Employee Finance', 'code' => 'employee-finance', 'description' => 'Privileged access to finantial data, and to the respective finacial dashboards.'],
            ['name' => 'Employee Coordination', 'code' => 'employee-coordination', 'description' => 'Privileged access to the coordination features only.'],
            ['name' => 'Employee Display Only', 'code' => 'employee-display-only', 'description' => 'Access to employee features as display only.'],
        ]);

        // Load default policies.
        Policy::saveMany([
            ['name'               => 'Surveyor Profile default',
             'code'               => 'surveyor-profile-default',
             'model'              => 'Waygou\Surveyor\Models\Profile',
             'policy'             => 'Waygou\Xheetah\Policies\Surveyor\Profile\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for surveyor profiles.', ],

            ['name'               => 'Surveyor Scope default',
             'code'               => 'surveyor-scope-default',
             'model'              => 'Waygou\Surveyor\Models\Scope',
             'policy'             => 'Waygou\Xheetah\Policies\Surveyor\Scope\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for surveyor scopes.', ],

            ['name'               => 'Surveyor Policy default',
             'code'               => 'surveyor-policy-default',
             'model'              => 'Waygou\Surveyor\Models\Policy',
             'policy'             => 'Waygou\Xheetah\Policies\Surveyor\Policy\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for surveyor policies.', ],

            ['name'               => 'Address default',
             'code'               => 'address-default',
             'model'              => 'Waygou\Xheetah\Models\Address',
             'policy'             => 'Waygou\Xheetah\Policies\Address\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for addresses.', ],

            ['name'               => 'Cost center default',
             'code'               => 'cost-center-default',
             'model'              => 'Waygou\Xheetah\Models\CostCenter',
             'policy'             => 'Waygou\Xheetah\Policies\CostCenter\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for cost centers.', ],

            ['name'               => 'Delivery default',
             'code'               => 'delivery-default',
             'model'              => 'Waygou\Xheetah\Models\Delivery',
             'policy'             => 'Waygou\Xheetah\Policies\Delivery\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for deliveries.', ],

            ['name'               => 'Main Role default',
             'code'               => 'main-role-default',
             'model'              => 'Waygou\Xheetah\Models\MainRole',
             'policy'             => 'Waygou\Xheetah\Policies\MainRole\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for main roles.', ],

            ['name'               => 'Client default',
             'code'               => 'client-default',
             'model'              => 'Waygou\Xheetah\Models\Client',
             'policy'             => 'Waygou\Xheetah\Policies\Client\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for clients.', ],

            ['name'               => 'Service Type default',
             'code'               => 'service-type-default',
             'model'              => 'Waygou\Xheetah\Models\ServiceType',
             'policy'             => 'Waygou\Xheetah\Policies\ServiceType\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for service types.', ],

             /*
            ['name' => 'Manages its own Client',
             'code' => 'client-only',
             'model' => 'Waygou\Xheetah\Models\Client',
             'policy' => 'Waygou\Xheetah\Policies\Client\RestrictToOwn',
             'is_data_restricted' => true,
             'description' => 'Restricts data to its own Client.'],
            */

            ['name'               => 'User default',
             'code'               => 'user-default',
             'model'              => 'Waygou\Xheetah\Models\User',
             'policy'             => 'Waygou\Xheetah\Policies\User\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for users.', ],

             /*
            ['name' => 'Client views its Couriers',
             'code' => 'couriers-from-client',
             'model' => 'Waygou\Xheetah\Models\Child\Courier',
             'policy' => 'Waygou\Xheetah\Policies\Child\Courier\RestrictToClientUsers',
             'is_data_restricted' => true,
             'description' => 'Restricts data to user Client Couriers.'],
            */

            ['name'               => 'Courier default',
             'code'               => 'courier-default',
             'model'              => 'Waygou\Xheetah\Models\Childs\Courier',
             'policy'             => 'Waygou\Xheetah\Policies\Childs\Courier\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for couriers.', ],

            ['name'               => 'Client User default',
             'code'               => 'client-user-default',
             'model'              => 'Waygou\Xheetah\Models\Childs\ClientUser',
             'policy'             => 'Waygou\Xheetah\Policies\Childs\ClientUser\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for client users.', ],

             /*
            ['name' => 'Courier manages its data',
             'code' => 'courier-only',
             'model' => 'Waygou\Xheetah\Models\Childs\Courier',
             'policy' => 'Waygou\Xheetah\Policies\Childs\Courier\RestrictToOwn',
             'is_data_restricted' => true,
             'description' => 'Restrict data to its own Courier.'],
            */

            ['name'               => 'Employee default',
             'code'               => 'employee-default',
             'model'              => 'Waygou\Xheetah\Models\Childs\Employee',
             'policy'             => 'Waygou\Xheetah\Policies\Childs\Employee\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for employees.', ],

            ['name'               => 'Duration Type default',
             'code'               => 'duration-type-default',
             'model'              => 'Waygou\Xheetah\Models\DurationType',
             'policy'             => 'Waygou\Xheetah\Policies\DurationType\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for duration types.', ],

            ['name'               => 'Vehicle Type default',
             'code'               => 'vehicle-type-default',
             'model'              => 'Waygou\Xheetah\Models\VehicleType',
             'policy'             => 'Waygou\Xheetah\Policies\VehicleType\DefaultPolicy',
             'is_data_restricted' => false,
             'description'        => 'Default policy for vehicle types.', ],

             /*
            ['name' => 'Employee manages its data',
             'code' => 'employee-only',
             'model' => 'Waygou\Xheetah\Models\Childs\Employee',
             'policy' => 'Waygou\Xheetah\Policies\Childs\RestrictToOwn',
             'is_data_restricted' => true,
             'description' => 'Restrict data to employees to manage themselves only.'],
             */
        ]);

        // Scopes.
        Scope::saveMany([
            ['name'        => 'Show my own Client',
             'description' => 'Scopes Clients to the client of the logged user.',
             'code'        => 'client-scope-myself',
             'model'       => 'Waygou\Xheetah\Models\Client',
             'scope'       => 'Waygou\Xheetah\Scopes\Client\RestrictToMyClient', ],
        ]);

        // Scopes.
        Scope::saveMany([
            ['name'        => 'Show my users from my Client',
             'description' => 'Scopes the Users (main role = client) that belong to the same client as the logged user.',
             'code'        => 'client-user-my-users',
             'model'       => 'Waygou\Xheetah\Models\Childs\ClientUser',
             'scope'       => 'Waygou\Xheetah\Scopes\Childs\ClientUser\RestrictToItsOwnClientUsers', ],
        ]);

        // Apply scopes to profiles.
        Profile::where('code', 'client-admin')->first()->scopes()->attach(
            [Scope::where('code', 'client-scope-myself')->first()->id,
             Scope::where('code', 'client-user-my-users')->first()->id, ]
        );

        Profile::where('code', 'client-standard')->first()->scopes()->attach(
            [Scope::where('code', 'client-scope-myself')->first()->id,
             Scope::where('code', 'client-user-my-users')->first()->id, ]
        );

        Profile::where('code', 'client-display-only')->first()->scopes()->attach(
            [Scope::where('code', 'client-scope-myself')->first()->id,
             Scope::where('code', 'client-user-my-users')->first()->id, ]
        );

        // Apply policies to profiles.
        // Super admin -- Full access to all entities + system tools.
        Profile::where('code', 'super-admin')->first()->policies()->attach(
            [Policy::where('code', 'main-role-default')->first()->id,
             Policy::where('code', 'client-default')->first()->id,
             Policy::where('code', 'cost-center-default')->first()->id,
             Policy::where('code', 'courier-default')->first()->id,
             Policy::where('code', 'user-default')->first()->id,
             Policy::where('code', 'service-type-default')->first()->id,
             Policy::where('code', 'employee-default')->first()->id,
             Policy::where('code', 'duration-type-default')->first()->id,
             Policy::where('code', 'delivery-default')->first()->id,
             Policy::where('code', 'vehicle-type-default')->first()->id,
             Policy::where('code', 'client-user-default')->first()->id,
             Policy::where('code', 'address-default')->first()->id,
             Policy::where('code', 'surveyor-profile-default')->first()->id,
             Policy::where('code', 'surveyor-policy-default')->first()->id,
             Policy::where('code', 'surveyor-scope-default')->first()->id,
            ],
            ['can_view_any'     => true,
             'can_view'         => true,
             'can_create'       => true,
             'can_update'       => true,
             'can_delete'       => true,
             'can_restore'      => true,
             'can_force_delete' => false,
            ]
        );
    }
}
