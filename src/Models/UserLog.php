<?php

namespace Waygou\Xheetah\Models;

use Waygou\Surveyor\Traits\AppliesScopes;
use Waygou\Xheetah\Abstracts\XheetahModel;

class UserLog extends XheetahModel
{
    use AppliesScopes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
