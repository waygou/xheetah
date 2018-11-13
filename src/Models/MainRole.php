<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Abstracts\XheetahModel;

class MainRole extends XheetahModel
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
