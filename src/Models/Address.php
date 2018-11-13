<?php

namespace Waygou\Xheetah\Models;

use Waygou\Surveyor\Traits\AppliesScopes;
use Waygou\Xheetah\Abstracts\XheetahModel;

class Address extends XheetahModel
{
    use AppliesScopes;

    public function addressable()
    {
        return $this->morphTo();
    }
}
