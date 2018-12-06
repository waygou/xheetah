<?php

namespace Waygou\Xheetah\Scopes\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Waygou\Surveyor\Bootstrap\SurveyorProvider;

class RestrictToMyUser implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model   $model
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (SurveyorProvider::isActive()) {
            $repository = SurveyorProvider::retrieve();
            if (array_key_exists('user', $repository)) {
                $builder->where('users.id', data_get($repository, 'user.id'));
            }
        }
    }
}
