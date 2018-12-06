<?php

namespace Waygou\Xheetah;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Waygou\Surveyor\Bootstrap\SurveyorProvider;
use Waygou\Xheetah\Commands\InstallCommand;
use Waygou\Xheetah\Models\Address;
use Waygou\Xheetah\Models\Childs\ClientUser;
use Waygou\Xheetah\Models\Childs\Courier;
use Waygou\Xheetah\Models\Client;
use Waygou\Xheetah\Models\CostCenter;
use Waygou\Xheetah\Models\Delivery;
use Waygou\Xheetah\Models\DurationType;
use Waygou\Xheetah\Models\MainRole;
use Waygou\Xheetah\Models\DeliveryType;
use Waygou\Xheetah\Models\User;
use Waygou\Xheetah\Models\Vehicle;
use Waygou\Xheetah\Models\VehicleType;
use Waygou\Xheetah\Observers\AddressObserver;
use Waygou\Xheetah\Observers\Childs\ClientUserObserver;
use Waygou\Xheetah\Observers\ClientObserver;
use Waygou\Xheetah\Observers\CostCenterObserver;
use Waygou\Xheetah\Observers\CourierObserver;
use Waygou\Xheetah\Observers\DeliveryObserver;
use Waygou\Xheetah\Observers\DurationTypeObserver;
use Waygou\Xheetah\Observers\MainRoleObserver;
use Waygou\Xheetah\Observers\DeliveryTypeObserver;
use Waygou\Xheetah\Observers\UserObserver;
use Waygou\Xheetah\Observers\VehicleObserver;
use Waygou\Xheetah\Observers\VehicleTypeObserver;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishing();

        $this->registerObservers();

        $this->bootListeners();
    }

    protected function bootListeners()
    {
        Event::listen('Illuminate\Auth\Events\Authenticated', function ($authenticated) {
            // Add client id in case the user is authenticated.
            // All users must have a client id.
            if (Auth::id() != null && SurveyorProvider::isActive()) {
                SurveyorProvider::add('client.id', me()->client->id);
            }
        });
    }

    protected function registerObservers()
    {
        User::observe(UserObserver::class);
        Client::observe(ClientObserver::class);
        Courier::observe(CourierObserver::class);
        MainRole::observe(MainRoleObserver::class);
        ClientUser::observe(ClientUserObserver::class);
        Address::observe(AddressObserver::class);
        CostCenter::observe(CostCenterObserver::class);
        Vehicle::observe(VehicleObserver::class);
        VehicleType::observe(VehicleTypeObserver::class);
        DurationType::observe(DurationTypeObserver::class);
        DeliveryType::observe(DeliveryTypeObserver::class);
        Delivery::observe(DeliveryObserver::class);
    }

    protected function registerPublishing()
    {
        if (!class_exists('CreateXheetahSchema')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../database/migrations/create_xheetah_schema.php.stub' => $this->app->databasePath()."/migrations/{$timestamp}_create_xheetah_schema.php",
            ], 'xheetah-create-schema');
        }

        $this->publishes([
            __DIR__.'/../config/xheetah.php'        => config_path('xheetah.php'),
            __DIR__.'/../config/auth.php'           => config_path('auth.php'),
            __DIR__.'/../config/surveyor.php'       => config_path('surveyor.php'),
            __DIR__.'/../config/surveyor_nova.php'  => config_path('surveyor_nova.php'),
            __DIR__.'/../database/factories/'       => database_path('factories/'),
            __DIR__.'/../database/seeds/'           => database_path('seeds/'),
        ], 'xheetah-overrides');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            //InstallCommand::class,
        ]);
    }
}
