<?php

namespace Waygou\Xheetah\Policies\Childs\Courier;

use Waygou\Surveyor\Traits\AppliesPolicies;
use Waygou\Xheetah\Models\Childs\Courier;
use Waygou\Xheetah\Models\User;

class RestrictToOwn
{
    private $repository;

    use AppliesPolicies;

    public function view(User $user, Courier $model)
    {
        return $user->id == $model->id;
    }

    public function update(User $user, Courier $model)
    {
        return $user->id == $model->id;
    }

    public function delete(User $user, Courier $model)
    {
        return $user->id == $model->id;
    }
}
