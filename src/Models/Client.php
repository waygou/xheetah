<?php

namespace Waygou\Xheetah\Models;

use Waygou\Surveyor\Traits\AppliesScopes;
use Waygou\Xheetah\Abstracts\XheetahModel;

class Client extends XheetahModel
{
    use AppliesScopes;

    protected $casts = [
        'contract_start' => 'date',
        'is_active'      => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function costCenters()
    {
        return $this->hasMany(CostCenter::class);
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
