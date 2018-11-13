<?php

namespace Waygou\Xheetah\Traits;

use Waygou\Xheetah\Scopes\Childs\Employee\RestrictByEmployeeMainRole;

trait IsEmployeeScope
{
    public static function bootIsEmployeeScope()
    {
        parent::addGlobalScope(new RestrictByEmployeeMainRole());
    }
}
