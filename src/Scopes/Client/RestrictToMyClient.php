<?php

namespace Waygou\Xheetah\Scopes\Client;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Waygou\Surveyor\Bootstrap\SurveyorProvider;

class RestrictToMyClient implements Scope
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
            if (array_key_exists('client', $repository)) {
                $builder->where('clients.id', data_get($repository, 'client.id'));
            }
        }
    }
}
