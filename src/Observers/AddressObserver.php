<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\Address;

class AddressObserver
{
    public function retrieved(Address $model)
    {
        //
    }

    public function saving(Address $model)
    {
        //
    }

    public function saved(Address $model)
    {
        save_user_log($model);
    }

    public function creating(Address $model)
    {
        //
    }

    public function created(Address $model)
    {
    }

    public function updating(Address $model)
    {
        //
    }

    public function updated(Address $model)
    {
        //
    }

    public function deleting(Address $model)
    {
        //
    }

    public function deleted(Address $model)
    {
        //
    }

    public function restored(Address $model)
    {
        //
    }

    public function forceDeleted(Address $model)
    {
        //
    }
}
