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
        // Generate a random 15 chars api token for REST transactions.
        $model->api_token = str_random(15);
    }

    public function created(Client $model)
    {
        //
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
