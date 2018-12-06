<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\MainRole;

class MainRoleObserver
{
    public function saving(MainRole $model)
    {
        if (empty($model->code)) {
            $model->code = kebab_case($model->name);
        }
    }

    public function saved(MainRole $model)
    {
        save_user_log($model);
    }

    public function creating(MainRole $model)
    {
        //
    }

    public function updating(MainRole $model)
    {
        //
    }

    public function created(MainRole $model)
    {
        //
    }

    public function updated(MainRole $model)
    {
        //
    }

    public function deleted(MainRole $model)
    {
        //
    }

    public function restored(MainRole $model)
    {
        //
    }

    public function forceDeleted(MainRole $model)
    {
        //
    }
}
