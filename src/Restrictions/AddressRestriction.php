<?php

namespace Waygou\Xheetah\Restrictions;

use Waygou\Xheetah\Models\Address;
use Waygou\Xheetah\Models\Client;
use Waygou\Xheetah\Models\CostCenter;

class AddressRestriction
{
    // Preload the addresses given a client id,
    // or a cost_center id from the form.
    // If a client id is given, returns all the
    // addresses loaded from that client id.
    // If a cost center id is given, returns all the
    // cost center addresses + the client addresses.
    public static function preloadAddresses($value, $origin = null, $fieldValues = null)
    {
        if ($value) {
            if ($origin == 'client') {
                $result = collect(Client::where('id', $value)
                                        ->first()
                                        ->addresses
                                        ->all())
                                  ->transform(function ($item) {
                                      return ['label'   => $item['name'],
                                              'display' => $item['name'],
                                              'value'   => $item['id'], ];
                                  })->toArray();
            }

            if ($origin == 'costCenter') {
                $result = collect(CostCenter::where('id', $value)
                                        ->first()
                                        ->addresses
                                        ->all())
                                  ->transform(function ($item) {
                                      return ['label'   => $item['name'],
                                              'display' => $item['name'],
                                              'value'   => $item['id'], ];
                                  })->toArray();
            }

            return ['options' => $result];
        } else {
            return ['label' => null, 'options' => null, 'value' => null];
        }
    }

    public static function loadPlace($value, $origin = null, $fieldValues = null)
    {
        if ($value) {

            /**
             * Returns a full address line given the value.
             */
            $result = Address::where('id', $value)
                             ->select(
                                 'address',
                                 'country_code',
                                 'postal_code',
                                 'city',
                                 'locality',
                                 'country',
                                 'map'
                             )
                             ->first()
                             ->toArray();

            return ['address' => $result];
        } else {
            return ['value' => null];
        }
    }

    public static function loadAddressPostalCode($value, $origin = null, $fieldValues = null)
    {
        if ($value) {
            $result = Address::where('id', $value)->first()->postal_code;

            return ['value' => $result];
        } else {
            return ['value' => null];
        }
    }

    public static function loadCity($value, $origin = null, $fieldValues = null)
    {
        if ($value) {
            $result = Address::where('id', $value)->first()->city;

            return ['value' => $result];
        } else {
            return ['value' => null];
        }
    }

    public static function loadLocality($value, $origin = null, $fieldValues = null)
    {
        if ($value) {
            $result = Address::where('id', $value)->first()->locality;

            return ['value' => $result];
        } else {
            return ['value' => null];
        }
    }

    public static function loadLatLng($value, $origin = null, $fieldValues = null)
    {
        if ($value) {
            $result = Address::where('id', $value)->first()->lat_lng;

            return ['value' => $result];
        } else {
            return ['value' => null];
        }
    }

    public static function loadMap($value, $origin = null, $fieldValues = null)
    {
        return ['value' => $value];
    }
}
