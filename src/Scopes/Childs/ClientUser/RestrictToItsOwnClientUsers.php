<?php

namespace Waygou\Xheetah\Scopes\Childs\ClientUser;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Waygou\Xheetah\Models\MainRole;

class RestrictToItsOwnClientUsers implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('client_id', me()->client->id)
                ->where('main_role_id', MainRole::where('code', 'client')->first()->id);
    }
}
