<?php

namespace Waygou\Xheetah\Policies\Childs\Courier;

use Waygou\Surveyor\Traits\AppliesPolicies;
use Waygou\Xheetah\Models\Child\Courier;
use Waygou\Xheetah\Models\User;

class RestrictToClientUsers
{
    private $repository;

    use AppliesPolicies;

    public function view(User $user, Courier $model)
    {
        return $model->client->id = $user->client->id;
    }

    public function update(User $user, Courier $model)
    {
        return $model->client->id = $user->client->id;
    }

    public function delete(User $user, Courier $model)
    {
        return $model->client->id = $user->client->id;
    }
}
