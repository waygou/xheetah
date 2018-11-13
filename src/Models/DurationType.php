<?php

namespace Waygou\Xheetah\Models;

use Waygou\Xheetah\Abstracts\XheetahModel;

class DurationType extends XheetahModel
{
    public function serviceTypes()
    {
        return $this->hasMany(ServiceType::class);
    }
}
