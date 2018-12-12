<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Abstracts\XheetahModel;

class DeliveryStatus extends XheetahModel
{
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function deliveryStatusChanges()
    {
        return $this->hasMany(DeliveryStatusChange::class);
    }
}
