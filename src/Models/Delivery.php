<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Abstracts\XheetahModel;

/**
 * @todo Add the logic of delivery history. So we can log all the changes
 * that a delivery had. The client will then be able to see if a full tracking log
 * for a respective delivery. When, how, what, it happened, etc.
 */
class Delivery extends XheetahModel
{
    protected $casts = [
        'with_return'                   => 'boolean',
        'price_to_request'              => 'float',
        'schedule_planned_at'           => 'datetime',
        'schedule_planned_pickup_start' => 'datetime',
        'schedule_planned_pickup_end'   => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function costCenter()
    {
        return $this->belongsTo(CostCenter::class);
    }

    public function deliveryType()
    {
        return $this->belongsTo(DeliveryType::class);
    }

    public function deliveryStatus()
    {
        return $this->belongsTo(DeliveryStatus::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function courier()
    {
        // We don't assign to a Courier model, because later on that user can not be
        // a Courier anymore. So, we attached it to the User.
        return $this->belongsTo(User::class, 'courier_id');
    }
}
