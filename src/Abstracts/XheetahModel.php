<?php

namespace Waygou\Xheetah\Abstracts;

use Waygou\Helpers\Traits\CanSaveMany;
use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class XheetahModel extends Model
{
    use SoftDeletes;
    use CanSaveMany;
    use UsesTenantConnection;

    protected $guarded = [];
}
