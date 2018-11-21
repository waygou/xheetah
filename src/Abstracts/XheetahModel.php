<?php

namespace Waygou\Xheetah\Abstracts;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Waygou\Helpers\Traits\CanSaveMany;

abstract class XheetahModel extends Model
{
    use SoftDeletes;
    use CanSaveMany;
    use UsesTenantConnection;

    protected $guarded = [];
}
