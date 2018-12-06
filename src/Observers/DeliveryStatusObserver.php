<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\DeliveryStatus;

class DeliveryStatusObserver
{
    public function retrieved(DeliveryStatus $model)
    {
        //
    }

    public function saving(DeliveryStatus $model)
    {
        if (empty($model->code)) {
            $model->code = kebab_case($model->name);
        }
    }

    public function saved(DeliveryStatus $model)
    {
        save_user_log($model);
    }

    public function creating(DeliveryStatus $model)
    {
        //
    }

    public function created(DeliveryStatus $model)
    {
        //
    }

    public function updating(DeliveryStatus $model)
    {
        //
    }

    public function updated(DeliveryStatus $model)
    {
        //
    }

    public function deleting(DeliveryStatus $model)
    {
        //
    }

    public function deleted(DeliveryStatus $model)
    {
        //
    }

    public function restored(DeliveryStatus $model)
    {
        //
    }

    public function forceDeleted(DeliveryStatus $model)
    {
        //
    }
}
