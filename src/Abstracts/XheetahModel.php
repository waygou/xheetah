<?php

namespace Waygou\Xheetah\Abstracts;

use Waygou\Helpers\Traits\CanSaveMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class XheetahModel extends Model
{
    use SoftDeletes;
    use CanSaveMany;

    protected $guarded = [];
}
