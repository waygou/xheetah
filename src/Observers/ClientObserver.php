<?php

namespace Waygou\Xheetah\Observers;

use Waygou\Xheetah\Models\Client;
use Waygou\Xheetah\Models\CostCenter;

class ClientObserver
{
    public function retrieved(Client $model)
    {
        //
    }

    public function saving(Client $model)
    {
        //
    }

    public function saved(Client $model)
    {
        save_user_log($model);
    }

    public function creating(Client $model)
    {
        //
    }

    public function created(Client $model)
    {
        /*
        // Set client id for cost center.
        $clientId = $model->id;

        // To add the full attributes, let's remove default fields.
        unset(
            $model->id,
            $model->updated_at,
            $model->created_at,
            $model->fiscal_number,
            $model->contracted_at
        );

        // Change the name for 'default'.
        $model->name = 'Default';

        // Add a default Cost Center with the same information as the client.
        CostCenter::create(array_merge($model->getAttributes(), ['client_id' => $clientId]));
        */
    }

    public function updating(Client $model)
    {
        //
    }

    public function updated(Client $model)
    {
        //
    }

    public function deleting(Client $model)
    {
        //
    }

    public function deleted(Client $model)
    {
        //
    }

    public function restored(Client $model)
    {
        //
    }

    public function forceDeleted(Client $model)
    {
        //
    }
}
