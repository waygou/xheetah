<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\DurationType;

class DurationTypeObserver
{
    public function retrieved(DurationType $model)
    {
        //
    }

    public function saving(DurationType $model)
    {
        if (empty($model->code)) {
            $model->code = kebab_case($model->name);
        }
    }

    public function saved(DurationType $model)
    {
        save_user_log($model);
    }

    public function creating(DurationType $model)
    {
        //
    }

    public function created(DurationType $model)
    {
        //
    }

    public function updating(DurationType $model)
    {
        //
    }

    public function updated(DurationType $model)
    {
        //
    }

    public function deleting(DurationType $model)
    {
        //
    }

    public function deleted(DurationType $model)
    {
        //
    }

    public function restored(DurationType $model)
    {
        //
    }

    public function forceDeleted(DurationType $model)
    {
        //
    }
}
