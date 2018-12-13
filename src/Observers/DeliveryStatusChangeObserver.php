<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\DeliveryStatusChange;

class DeliveryStatusChangeObserver
{
    public function retrieved(DeliveryStatusChange $model)
    {
        //
    }

    public function saving(DeliveryStatusChange $model)
    {
        //
    }

    public function saved(DeliveryStatusChange $model)
    {
        save_user_log($model);
    }

    public function creating(DeliveryStatusChange $model)
    {
        //
    }

    public function created(DeliveryStatusChange $model)
    {
        //
    }

    public function updating(DeliveryStatusChange $model)
    {
        //
    }

    public function updated(DeliveryStatusChange $model)
    {
        //
    }

    public function deleting(DeliveryStatusChange $model)
    {
        //
    }

    public function deleted(DeliveryStatusChange $model)
    {
        //
    }

    public function restored(DeliveryStatusChange $model)
    {
        //
    }

    public function forceDeleted(DeliveryStatusChange $model)
    {
        //
    }
}
