<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Models\Delivery;
use Waygou\Xheetah\Models\Childs\Courier;
use Waygou\Xheetah\Models\DeliveryStatus;
use Waygou\Xheetah\Abstracts\XheetahModel;

class DeliveryStatusChange extends XheetahModel
{
    public function deliveryStatus()
    {
        return $this->belongsTo(DeliveryStatus::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class);
    }
}
