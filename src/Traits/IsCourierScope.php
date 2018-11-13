<?php

namespace Waygou\Xheetah\Traits;

use Waygou\Xheetah\Scopes\Childs\Courier\RestrictByCourierMainRole;

trait IsCourierScope
{
    public static function bootIsCourierScope()
    {
        parent::addGlobalScope(new RestrictByCourierMainRole());
    }
}
