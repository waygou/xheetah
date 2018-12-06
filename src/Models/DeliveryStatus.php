<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Models\Delivery;
use Waygou\Xheetah\Abstracts\XheetahModel;

class DeliveryStatus extends XheetahModel
{
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
