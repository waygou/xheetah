<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\CostCenter;

class CostCenterObserver
{
    public function retrieved(CostCenter $model)
    {
        //
    }

    public function saving(CostCenter $model)
    {
        //
    }

    public function saved(CostCenter $model)
    {
        save_user_log($model);
    }

    public function creating(CostCenter $model)
    {
        //
    }

    public function created(CostCenter $model)
    {
        //
    }

    public function updating(CostCenter $model)
    {
        //
    }

    public function updated(CostCenter $model)
    {
        //
    }

    public function deleting(CostCenter $model)
    {
        //
    }

    public function deleted(CostCenter $model)
    {
        //
    }

    public function restored(CostCenter $model)
    {
        //
    }

    public function forceDeleted(CostCenter $model)
    {
        //
    }
}
