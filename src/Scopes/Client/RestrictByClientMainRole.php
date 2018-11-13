<?php

namespace Waygou\Xheetah\Scopes\Client;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Waygou\Xheetah\Models\MainRole;

class RestrictByClientMainRole implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('main_role_id', MainRole::where('code', 'client')->first()->id);
    }
}
