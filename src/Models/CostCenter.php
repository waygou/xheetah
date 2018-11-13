<?php

namespace Waygou\Xheetah\Models;

use Waygou\Surveyor\Traits\AppliesScopes;
use Waygou\Xheetah\Abstracts\XheetahModel;

class CostCenter extends XheetahModel
{
    use AppliesScopes;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }
}
