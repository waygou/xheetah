<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\Delivery;
use Illuminate\Support\Facades\Auth;
use Waygou\Xheetah\Models\DeliveryStatusChange;

class DeliveryObserver
{
    public function retrieved(Delivery $model)
    {
        //
    }

    public function saving(Delivery $model)
    {
        // Unset non-eloquent fields.
        unset($model['origin_related_address']);
        unset($model['destination_related_address']);
    }

    public function saved(Delivery $model)
    {
        save_user_log($model);

        // Status changed? -- New entry on DeliveryStatusChange
        if ($model->isDirty('delivery_status_id') && $model->delivery_status_id != null) {
            DeliveryStatusChange::saveMany([
                ['delivery_id' => $model->id,
                 'delivery_status_id' => $model->delivery_status_id,
                 'courier_id' => $model->courier_id, ],
                ]);
        }
    }

    public function creating(Delivery $model)
    {
        // Delivery is always created by the logged user.
        if ($model->created_by == null) {
            $model->created_by = Auth::id();
        }
    }

    public function created(Delivery $model)
    {
        //
    }

    public function updating(Delivery $model)
    {
        //
    }

    public function updated(Delivery $model)
    {
        //
    }

    public function deleting(Delivery $model)
    {
        //
    }

    public function deleted(Delivery $model)
    {
        //
    }

    public function restored(Delivery $model)
    {
        //
    }

    public function forceDeleted(Delivery $model)
    {
        //
    }
}
