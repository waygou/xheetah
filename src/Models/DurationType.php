<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Abstracts\XheetahModel;

class DurationType extends XheetahModel
{
    public function deliveryTypes()
    {
        return $this->hasMany(DeliveryType::class);
    }
}
