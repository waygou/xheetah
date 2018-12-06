<?php

namespace Waygou\Xheetah\Observers;

use Exception;
use Waygou\Xheetah\Models\MainRole;
use Waygou\Xheetah\Models\Childs\Courier;

class CourierObserver
{
    /**
     * Handle the model "saving" event.
     *
     * @param \Waygou\Xheetah\Models\Childs\Courier $model
     *
     * @return void
     */
    public function saving(Courier $model)
    {
        $model->main_role_id = MainRole::where('code', 'courier')->first()->id;
    }

    /**
     * Handle the model "saved" event.
     *
     * @param \Waygou\Xheetah\Models\Childs\Courier $model
     *
     * @return void
     */
    public function saved(Courier $model)
    {
    }

    /**
     * Handle the model "creating" event.
     *
     * @param \Waygou\Xheetah\Models\Childs\Courier $model
     *
     * @return void
     */
    public function creating(Courier $model)
    {
        //
    }

    /**
     * Handle the model "updating" event.
     *
     * @param \Waygou\Xheetah\Models\Childs\Courier $model
     *
     * @return void
     */
    public function updating(Courier $model)
    {
        //
    }

    /**
     * Handle the model "created" event.
     *
     * @param \Waygou\Xheetah\Models\Childs\Courier $model
     *
     * @return void
     */
    public function created(Courier $model)
    {
        //
    }

    /**
     * Handle the model "updated" event.
     *
     * @param \Waygou\Xheetah\Models\Childs\Courier $model
     *
     * @return void
     */
    public function updated(Courier $model)
    {
        //
    }

    /**
     * Handle the model "deleted" event.
     *
     * @param \Waygou\Xheetah\Models\Childs\Courier $model
     *
     * @return void
     */
    public function deleted(Courier $model)
    {
        //
    }

    /**
     * Handle the model "restored" event.
     *
     * @param \Waygou\Xheetah\Models\Childs\Courier $model
     *
     * @return void
     */
    public function restored(Courier $model)
    {
        //
    }

    /**
     * Handle the model "force deleted" event.
     *
     * @param \Waygou\Xheetah\Models\Childs\Courier $model
     *
     * @return void
     */
    public function forceDeleted(Courier $model)
    {
        throw new Exception('Not allowed on this Xheetah version.');
    }
}
