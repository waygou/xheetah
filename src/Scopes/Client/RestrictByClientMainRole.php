<?php

namespace Waygou\Xheetah\Scopes\Client;

use Waygou\Xheetah\Models\MainRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class RestrictByClientMainRole implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('main_role_id', MainRole::where('code', 'client')->first()->id);
    }
}
