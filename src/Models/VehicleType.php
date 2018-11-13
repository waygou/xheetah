<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Abstracts\XheetahModel;

class VehicleType extends XheetahModel
{
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
