<?php

namespace Waygou\Xheetah\Policies\Childs\Employee;

use Waygou\Surveyor\Traits\AppliesPolicies;
use Waygou\Xheetah\Models\Childs\Employee;
use Waygou\Xheetah\Models\User;

class RestrictToOwn
{
    private $repository;

    use AppliesPolicies;

    public function view(User $user, Employee $model)
    {
        return $user->id == $model->id;
    }

    public function update(User $user, Employee $model)
    {
        return $user->id == $model->id;
    }

    public function delete(User $user, Employee $model)
    {
        return $user->id == $model->id;
    }
}
