<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\DeliveryType;

class DeliveryTypeObserver
{
    public function retrieved(DeliveryType $model)
    {
        //
    }

    public function saving(DeliveryType $model)
    {
        if (empty($model->code)) {
            $model->code = kebab_case($model->name);
        }
    }

    public function saved(DeliveryType $model)
    {
        save_user_log($model);
    }

    public function creating(DeliveryType $model)
    {
        //
    }

    public function created(DeliveryType $model)
    {
        //
    }

    public function updating(DeliveryType $model)
    {
        //
    }

    public function updated(DeliveryType $model)
    {
        //
    }

    public function deleting(DeliveryType $model)
    {
        //
    }

    public function deleted(DeliveryType $model)
    {
        //
    }

    public function restored(DeliveryType $model)
    {
        //
    }

    public function forceDeleted(DeliveryType $model)
    {
        //
    }
}
