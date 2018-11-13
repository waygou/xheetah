<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Abstracts\XheetahModel;

class ServiceType extends XheetahModel
{
    protected $casts = [
        'price_request'            => 'float',
        'price_request_additional' => 'float',
        'price_km'                 => 'float',
        'price_km_additional'      => 'float',
    ];

    public function durationType()
    {
        return $this->belongsTo(DurationType::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
