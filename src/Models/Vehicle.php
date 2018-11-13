<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Abstracts\XheetahModel;

class Vehicle extends XheetahModel
{
    protected $casts = [
        'since' => 'date',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }
}
