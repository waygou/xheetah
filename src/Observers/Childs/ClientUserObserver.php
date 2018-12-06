<?php

namespace Waygou\Xheetah\Observers\Childs;

use Waygou\Xheetah\Models\MainRole;
use Waygou\Xheetah\Models\Childs\ClientUser;

class ClientUserObserver
{
    public function retrieved(ClientUser $model)
    {
        //
    }

    public function saving(ClientUser $model)
    {
        $model->main_role_id = MainRole::where('code', 'client')->first()->id;
    }

    public function saved(ClientUser $model)
    {
        //
    }

    public function creating(ClientUser $model)
    {
        //
    }

    public function created(ClientUser $model)
    {
        //
    }

    public function updating(ClientUser $model)
    {
        //
    }

    public function updated(ClientUser $model)
    {
        //
    }

    public function deleting(ClientUser $model)
    {
        //
    }

    public function deleted(ClientUser $model)
    {
        //
    }

    public function restored(ClientUser $model)
    {
        //
    }

    public function forceDeleted(ClientUser $model)
    {
        //
    }
}
