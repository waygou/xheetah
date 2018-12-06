<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\Delivery;
use Illuminate\Support\Facades\Auth;

class DeliveryObserver
{
    public function retrieved(Delivery $model)
    {
        //
    }

    public function saving(Delivery $model)
    {
        //
    }

    public function saved(Delivery $model)
    {
        //
    }

    public function creating(Delivery $model)
    {
        // Delivery is always created by the logged user.
        $model->created_by = Auth::id();
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
