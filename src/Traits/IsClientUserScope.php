<?php

namespace Waygou\Xheetah\Traits;

use Waygou\Xheetah\Scopes\Client\RestrictByClientMainRole;

trait IsClientUserScope
{
    public static function bootIsClientUserScope()
    {
        parent::addGlobalScope(new RestrictByClientMainRole());
    }
}
