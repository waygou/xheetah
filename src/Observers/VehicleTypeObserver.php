<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\VehicleType;

class VehicleTypeObserver
{
    public function retrieved(VehicleType $model)
    {
        //
    }

    public function saving(VehicleType $model)
    {
        if (empty($model->code)) {
            $model->code = kebab_case($model->name);
        }
    }

    public function saved(VehicleType $model)
    {
        save_user_log($model);
    }

    public function creating(VehicleType $model)
    {
        //
    }

    public function created(VehicleType $model)
    {
        //
    }

    public function updating(VehicleType $model)
    {
        //
    }

    public function updated(VehicleType $model)
    {
        //
    }

    public function deleting(VehicleType $model)
    {
        //
    }

    public function deleted(VehicleType $model)
    {
        //
    }

    public function restored(VehicleType $model)
    {
        //
    }

    public function forceDeleted(VehicleType $model)
    {
        //
    }
}
